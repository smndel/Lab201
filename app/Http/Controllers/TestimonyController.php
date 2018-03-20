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

        return view('back.testimony.create',['applicants' => $applicants]);
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
        //
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
        $testimony = Testimony::find($id);
        $testimony->delete();

        return redirect()->route('testimony.index')->with('message', 'Témoignage effacé');
    }
}
