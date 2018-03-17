<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage::disk('local')->delete(Storage::AllFiles());

    	factory(App\Service::class, 10)->create()->each(function($service){    		

		// Assignation d'une image à une service
        	$link = str_random(12).'.jpg';//hash de lien pour la sécurité(injection de sscripts de protection)
			$file = file_get_contents('https://placeimg.com/640/480/tech');
		 
			Storage::disk('local')->put($link, $file);

			$service->picture()->create([
		    	'title' =>'Default', //valeur par défaut
		    	'link'	=> $link,
		    ]);

    	});	
    }
}
