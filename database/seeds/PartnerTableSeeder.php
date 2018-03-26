<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage::disk('local')->delete(Storage::AllFiles());
         
        factory(App\Partner::class, 5)->create()->each(function($partner){
         //Relation des partners avec les formations
        	$services = App\Service::pluck('id')->shuffle()->slice(0, rand(1, 3))->all();
		    $partner->services()->attach($services);


		    // Assignation d'une image à une service
        	$link = str_random(12).'.jpg';//hash de lien pour la sécurité(injection de sscripts de protection)
			$file = file_get_contents('https://placeimg.com/250/250/people');
		 
			Storage::disk('local')->put($link, $file);

			$partner->picture()->create([
		    	'title' =>'Default', //valeur par défaut
		    	'link'	=> $link,
		    ]);

		});
    }
}
