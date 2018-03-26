<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
use Storage;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::paginate(10);

        return view('back.reference.index', ['references'=>$references]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.reference.create');
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
            'company' => 'required',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $reference = Reference::create($request->all());

        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $reference->picture()->create([
        'link' => $link,
        // 'title' => $request->title_image?? $request->title
        ]);
        }

        return redirect()->route('reference.index')->with('message', 'Référence enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reference = Reference::find($id);

        return view('back.reference.show', ['reference' => $reference]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reference = Reference::find($id);

        return view('back.reference.edit', ['reference' => $reference]);
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
            'company' => 'required',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $reference = Reference::find($id);
        $reference->update($request->all());

        $image = $request->file('picture');    

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($reference->picture)>0){
                Storage::disk('local')->delete($reference->picture->link);//Supprime physiquemnt l'image
                $reference->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $reference->picture()->create(['link' => $link]);
        }
    

        return redirect()->route('reference.index')->with('message', 'Référence modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::find($id);
        $reference->delete();

        return redirect()->route('reference.index')->with('message', 'Référence effacé');
    }
}
