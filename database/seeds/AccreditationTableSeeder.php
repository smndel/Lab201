<?php

use Illuminate\Database\Seeder;

class AccreditationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Accreditation::class, 10)->create()->each(function($accreditation){    		

		// Assignation d'une image à une Prestation
        	$link = str_random(12).'.jpg';//hash de lien pour la sécurité(injection de sscripts de protection)
			$file = file_get_contents('https://placeimg.com/150/150/animals');
		 
			Storage::disk('local')->put($link, $file);

			$accreditation->picture()->create([
		    	'title' =>'Default', //valeur par défaut
		    	'link'	=> $link,
		    ]);

    	});	
    }
}
