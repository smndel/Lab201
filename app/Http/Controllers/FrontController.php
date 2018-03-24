<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Partner;
use App\Applicant;
use App\Actuality;
use App\Reference;
use App\Accreditation;
use App\Testimony;
use Mapper;


class FrontController extends Controller
{
    public function index(){
    	
    	$services = Service::all()->where('statut', 'published');
    	$partners = Partner::all();
    	$actualities = Actuality::all();
    	$applicants = Applicant::all();
    	$accreditations = Accreditation::all()->where('statut', 'publish');
    	$testimony = Testimony::all()->sortByDesc('created_at')->where('statut', 'publish')->first();
    	$references = Reference::all()->where('statut', 'publish'); 

        
    	if(isset($testimony)){
    	   $testimony_applicant = Applicant::find($testimony->applicant_id);
    	}

        //Pour avoir la première lettre du nom de famille au témoignage
    	function firstLetter($string){
        	$str = $string;
    		$str = $str{0}; // pour récupéré en char

    		return $str;	
    	}
        $applicantFL = firstLetter($testimony->applicant->last_name);

        //GOOGLE MAP
    	Mapper::map(48.8740378, 2.3147504, ['zoom' => 16, 'markers' => ['title' => 'AFOGEC COMPETENCES', 'animation' => 'DROP']]);


    	return view('front.index', [
            'services'              => $services, 
            'actualities'           => $actualities, 
            'applicants'            => $applicants, 
            'accreditations'        => $accreditations, 
            'partners'              => $partners, 
            'testimony'             => $testimony, 
            'applicantFL'           => $applicantFL, 
            'testimony_applicant'   => $testimony_applicant, 
            'references'            => $references]); 	
    }

    

}


