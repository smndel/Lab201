<?php

use Illuminate\Database\Seeder;

class ActualityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Actuality::class, 15)->create()->each(function($actuality){    		

		// Assignation d'une image à une Prestation
        	$link = str_random(12).'.jpg';//hash de lien pour la sécurité(injection de sscripts de protection)
			$file = file_get_contents('https://placeimg.com/640/480/arch');
		 
			Storage::disk('local')->put($link, $file);

			$actuality->picture()->create([
		    	'title' =>'Default', //valeur par défaut
		    	'link'	=> $link,
		    ]);

    	});	
    }
}
