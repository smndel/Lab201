<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actuality;
use Storage;

class ActualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualities = Actuality::paginate(10);

        return view('back.actuality.index', ['actualities' => $actualities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.actuality.create');
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
            'title' => 'required',
            'description' => 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $actuality = Actuality::create($request->all());

        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $actuality->picture()->create([
        'link' => $link,
        // 'title' => $request->title_image?? $request->title
        ]);
        }

        return redirect()->route('actuality.index')->with('message', 'Actualité enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actuality = Actuality::find($id);

        return view('back.actuality.show', ['actuality' => $actuality]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actuality = Actuality::find($id);

        return view('back.actuality.edit', ['actuality'=>$actuality]);
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
            'title' => 'required',
            'description' => 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $actuality = Actuality::find($id);
        $actuality->update($request->all());

        $image = $request->file('picture');    

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($actuality->picture)>0){
                Storage::disk('local')->delete($actuality->picture->link);//Supprime physiquemnt l'image
                $actuality->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $actuality->picture()->create(['link' => $link]);
        }
    

        return redirect()->route('actuality.index')->with('message', 'Actualité modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actuality = Actuality::find($id);
        $actuality->delete();

        return redirect()->route('actuality.index')->with('message', 'Actualité effacé');
    }
}
