<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accreditation;
use Storage;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accreditations = Accreditation::paginate(10);

        return view('back.accreditation.index', ['accreditations'=>$accreditations]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.accreditation.create');
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
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $accreditation = Accreditation::create($request->all());

        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $accreditation->picture()->create([
        'link' => $link,
        // 'title' => $request->title_image?? $request->title
        ]);
        }

        return redirect()->route('accreditation.index')->with('message', 'Accréditation enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accreditation = Accreditation::find($id);

        return view('back.accreditation.show', ['accreditation' => $accreditation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accreditation = Accreditation::find($id);

        return view('back.accreditation.edit', ['accreditation' => $accreditation]);
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
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $accreditation = Accreditation::find($id);
        $accreditation->update($request->all());

        $image = $request->file('picture');    

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($accreditation->picture)>0){
                Storage::disk('local')->delete($accreditation->picture->link);//Supprime physiquemnt l'image
                $accreditation->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $accreditation->picture()->create(['link' => $link]);
        }
    

        return redirect()->route('accreditation.index')->with('message', 'Accréditation modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accreditation = Accreditation::find($id);
        $accreditation->delete();

        return redirect()->route('accreditation.index')->with('message', 'Accréditation effacé');
    }
}
