<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Applicant;
use Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate(10);

        return view('back.partner.index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::pluck('title', 'id')->all();

        return view('back.partner.create', ['services'=>$services]);
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
            'name' => 'required',
            'bio' => 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $partner = Partner::create($request->all());
        $partner->services()->attach($request->services);

        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $partner->picture()->create([
        'link' => $link,
        // 'title' => $request->title_image?? $request->title
        ]);
        }

        return redirect()->route('partner.index')->with('message', 'Collaborateur enregistré');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);

        return view('back.partner.show', ['partner' => $partner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        $services = Service::pluck('title', 'id')->all();

        return view('back.partner.edit', ['services'=>$services, 'partner'=>$partner]);
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
            'name' => 'required',
            'bio' => 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);

        $partner = Partner::find($id);
        $partner->update($request->all());
        $partner->services()->sync($request->services);

        $image = $request->file('picture');    

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($partner->picture)>0){
                Storage::disk('local')->delete($partner->picture->link);//Supprime physiquemnt l'image
                $partner->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $applicant=Apllicant::find($request->aaplicant_id);

        $applicant->picture()->create(['link' => $link]);
        }
    

        return redirect()->route('partner.index')->with('message', 'Collaborateur modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect()->route('partner.index')->with('message', 'Bénéficiaire effacé');
    }
}
