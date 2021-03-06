<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Partner;
use App\Funding;
use App\Service;
use App\Education_level;
use App\Event;
use DateTime;
use Dateinterval;
use Storage;
use App\Http\Requests\ApplicantRequest;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();

        return view('back.applicant.applicant_table', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::pluck('name','id')->all();
        $services = Service::pluck('title', 'id')->all();
        $event = Event::all();
        $education_levels = Education_level::pluck('level', 'id');
        $fundings = Funding::pluck('title', 'id');

        return view('back.applicant.create', [
            'partners'          => $partners, 
            'services'          => $services, 
            'education_levels'  => $education_levels, 
            'fundings'          => $fundings, 
            'event'             => $event
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {
        $applicant = Applicant::create($request->all());
        $applicant->partners()->attach($request->partners);
        $applicant->services()->attach($request->services);
        $comment = $request->comment;
        $applicant->comment()->create([
            'comments' => $comment,
        ]);

        $event = $request->event;
        
        if(isset($event)){
            foreach($event as $key=>$value)
            {
                if($value==null){
                    unset($event[$key]);
                }
            }

            if(count($event)%2==0){
                $event_length = count($event);

                for($i=0; $i<$event_length; $i=$i+2){

                    $applicant->events()->create([
                        'value'      => $event[$i],
                        'start_date' => $event[$i+1],
                        'end_date'   => $event[$i+1]]);
                }

            }else{

                return redirect()->route('applicant.create', $applicant)->with('message', "Il manque la date et/ou le montant pour l'étalement du paiement");
            }
        }

        

        return redirect()->route('applicant.index')->with('message', 'Bénéficiaire enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::find($id);

        return view('back.applicant.show', ['applicant' => $applicant]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        $partners = Partner::pluck('name','id')->all();
        $services = Service::pluck('title', 'id')->all();
        $education_levels = Education_level::pluck('level', 'id');
        $fundings = Funding::pluck('title', 'id');
        $events = Event::all()->where('applicant_id', $id);

        return view('back.applicant.edit', [
            'partners'          => $partners, 
            'services'          => $services, 
            'education_levels'  => $education_levels, 
            'fundings'          => $fundings, 
            'applicant'         => $applicant, 
            'events'            => $events
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantRequest $request, $id)
    {
        $applicant = Applicant::find($id);
        $applicant->update($request->all());
        $applicant->partners()->sync($request->partners);
        $applicant->services()->sync($request->services);

        $comment = $request->comment;
        $applicant->comment()->update([
            'comments' => $comment,
        ]);


        $event = $request->event;
        $applicant = Applicant::find($id);
        
        if(isset($event)){
            foreach($event as $key=>$value)
            {
                if($value==null){
                    unset($event[$key]);
                }
            }

            if(count($event)%2==0){
                $applicant->events()->delete();
                $event_length = count($event);

                for($i=0; $i<$event_length; $i=$i+2){
                    $applicant->events()->create([
                        'value'      => $event[$i],
                        'start_date' => $event[$i+1],
                        'end_date'   => $event[$i+1]
                    ]);
                }

            }else{
                return redirect()->route('applicant.edit', $applicant)->with('message', "Il manque la date et/ou le montant pour l'étalement du paiement");
            }
        }else{
            $applicant->events()->delete();
        }

        

        return redirect()->route('applicant.index')->with('message', 'Bénéficiaire modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();

        return redirect()->route('applicant.index')->with('message', 'Bénéficiaire effacé');
    }


    public function getApplicants(Request $request){
        
        $columns = array(
            0 => 'last_name',
            1 => 'first_name',
            2 => 'company',
            3 => 'accepted',
            4 => 'funded',
            5 => 'price',
            6 => 'created_at',
            7 => 'updated_at',
            8 => 'action',
            9 => 'id',
        );
        

        $totalData = Applicant::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value'))){
            $posts = Applicant::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            $totalFiltered = Applicant::count();
        }else{
            $search = $request->input('search.value');
            $posts = Applicant::where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name','like',"%{$search}%")
                            ->orWhere('created_at','like',"%{$search}%")
                            ->orWhere('company','like',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
            $totalFiltered = Applicant::where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name','like',"%{$search}%")
                            ->count();
        }       
                    
        
        $data = array();
        
        if($posts){
            foreach($posts as $r){
                $nestedData['last_name'] = $r->last_name;
                $nestedData['first_name'] = $r->first_name;
                $nestedData['company'] = $r->company;
                $nestedData['accepted'] = $r->accepted;
                $nestedData['funded'] = $r->funded;
                $nestedData['price'] = $r->price;
                $nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
                $nestedData['updated_at'] = date('d-m-Y',strtotime($r->updated_at));
                $nestedData['action'] = '
                    <a href=" '.route('applicant.show', $r->id).'" class="btn btn-success btn-xs">Voir</a>
                    <a href=" '.route('applicant.edit', $r->id).'" class="btn btn-warning btn-xs">Editer</a>
                    <form style="display:inline-block" class="delete" action="'.route('applicant.destroy', $r->id).'" method="POST"><button type="submit" class="btn btn-danger btn-xs" value="delete">Supprimer</button><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"></form>';

                $data[] = $nestedData;
            }
        }
        
        $json_data = array(
            "draw"          => intval($request->input('draw')),
            "recordsTotal"  => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"          => $data
        );
        
        echo json_encode($json_data);
    }


 
}
