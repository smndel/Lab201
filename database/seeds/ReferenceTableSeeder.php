<?php

use Illuminate\Database\Seeder;

class ReferenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	factory(App\Reference::class, 10)->create()->each(function($reference){    

		// Assignation d'une image à une service
        	$link = str_random(12).'.jpg';//hash de lien pour la sécurité(injection de sscripts de protection)
			$file = file_get_contents('https://placeimg.com/640/480/tech');
		 
			Storage::disk('local')->put($link, $file);

			$reference->picture()->create([
		    	'title' =>'Default', //valeur par défaut
		    	'link'	=> $link,
		    ]);

    	});
    }
}
