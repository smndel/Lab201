<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::paginate(10);

        return view('back.applicant.applicant_table', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getUsers(Request $request){
        
        $columns = array(
            0 => 'last_name',
            1 => 'first_name',
            2 => 'company',
            3 => 'accepted',
            4 => 'funded',
            5 => 'price',
            6 => 'created_at',
            7 => 'action',
            8 => 'id',
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
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $nestedData['action'] = '
                    <a href=" '.route('applicant.show', $r->id).'" class="btn btn-success btn-xs">Voir</a>
                    <a href="#!" class="btn btn-warning btn-xs">Editer</a>
                    <a href="#!" class="btn btn-danger btn-xs">Supprimer</a>';

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
