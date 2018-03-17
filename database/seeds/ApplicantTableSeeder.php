<?php

use Illuminate\Database\Seeder;

class ApplicantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    
        //Création de niveau d'étude
        App\Education_level::create([
    		'level' => 'BAC'
    	]);
    	App\Education_level::create([
    		'level' => 'BAC +1'
    	]);
    	App\Education_level::create([
    		'level' => 'BAC +2'
    	]);
    	App\Education_level::create([
    		'level' => 'BAC +3'
    	]);
    	App\Education_level::create([
    		'level' => 'BAC +4'
    	]);
    	App\Education_level::create([
    		'level' => 'BAC +5'
    	]);

    	//Création du funding
        App\Funding::create([
    		'title' => 'OPACIF'
    	]);
    	App\Funding::create([
    		'title' => 'personnel'
    	]);
    	App\Funding::create([
    		'title' => 'entreprise'
    	]);

        factory(App\Applicant::class, 30)->create()->each(function($applicant){

        	$applicant->comment()->create([
        		'comments' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sunt odio, corrupti. Iusto incidunt totam reiciendis sit doloribus dolore numquam illum voluptas, eaque. Unde omnis culpa, dolorum voluptas a id.'
        	]);
    
   
        	$education_level = App\Education_level::find(rand(1,6));
        	$applicant->Education_level()->associate($education_level);
        	$applicant->save();
        
 
        	$funding = App\Funding::find(rand(1,3));
        	$applicant->funding()->associate($funding);
        	$applicant->save();

    //Relation des partners avec les formations
        	$partners = App\Partner::pluck('id')->shuffle()->slice(0, 1)->all();
		    $applicant->partners()->attach($partners); 
    	;

    //Relation des services avec les formations
        	$services = App\Service::pluck('id')->shuffle()->slice(0, 1)->all();
		    $applicant->services()->attach($services); 
    	});

    }
}

