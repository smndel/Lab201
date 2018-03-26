<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimony;
use App\Applicant;
use Storage;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::paginate(10);

        return view('back.testimony.index', ['testimonies'=>$testimonies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicants = Applicant::all();
        $testimonies = Testimony::all();
        $present_id = Testimony::pluck('applicant_id')->toArray();

        return view('back.testimony.create', ['testimonies' => $testimonies, 'applicants'=>$applicants, 'present_id' => $present_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'testimony'  => 'sometimes|nullable',
            'picture'  => 'image|mimes:jpg,png,jpeg',
        ]);

        $testimony = Testimony::create($request->all());   
        
        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $testimony->picture()->create([
        'link' => $link,
        // 'title' => $request->title_image?? $request->title
        ]);
        }



        return redirect()->route('testimony.index')->with('message', 'Témoignage enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimony = Testimony::find($id);

        return view('back.testimony.show', ['testimony' => $testimony]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimony = Testimony::find($id);

        return view('back.testimony.edit', ['testimony' => $testimony]);
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
        $this->validate($request,
        [
            'testimony'  => 'sometimes|nullable',
            'picture'  => 'image|mimes:jpg,png,jpeg',
        ]);


        $testimony = Testimony::find($id);
        $testimony->update($request->all());

        $image = $request->file('picture');      

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($testimony->picture)>0){
                Storage::disk('local')->delete($testimony->picture->link);//Supprime physiquemnt l'image
                $testimony->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $testimony->picture()->create(['link' => $link]);
        }

        return redirect()->route('testimony.index')->with('message', 'Témoignage modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimony = Testimony::find($id);
        $testimony->delete();

        return redirect()->route('testimony.index')->with('message', 'Témoignage effacé');
    }
}
