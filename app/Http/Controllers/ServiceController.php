<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Partner;
use App\Applicant;
use Storage;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('back.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::pluck('name','id')->all();
        $types = Service::pluck('type', 'id');
        $categories = Service::pluck('category', 'id');

        return view('back.service.create', [
            'partners'      => $partners, 
            'categories'    => $categories, 
            'types'         => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = service::create($request->all());
        $service->partners()->attach($request->partners);

        $img = $request->file('picture');
        if(!empty($img)){

        //Méthode store retourne un link hash sécurisé
        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $service->picture()->create([
        'link' => $link,
        ]);
        }

        return redirect()->route('service.index')->with('message', 'Service enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('back.service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $partners = Partner::pluck('Name', 'id')->all();

        return view('back.service.edit', ['service'=>$service, 'partners'=>$partners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        $service->update($request->all());
        $service->partners()->sync($request->partners);

        $image = $request->file('picture');    

        if(!empty($image)){
        //Suppression de l'image si elle existe
            if(count($service->picture)>0){
                Storage::disk('local')->delete($service->picture->link);//Supprime physiquemnt l'image
                $service->picture()->delete();//Supprime l'information en base de données
            }

        $link = $request->file('picture')->store('./');
        //Mettre à jour la table picture pour le lien vers l'image dans la base de donnée
        $service->picture()->create(['link' => $link]);
        }

        return redirect()->route('service.index')->with('message', 'Service modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('service.index')->with('message', 'Service effacé');
    }

}
