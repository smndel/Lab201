<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Partner;
use App\Applicant;
use App\Actuality;
use App\Reference;
use App\Accreditation;



class FrontController extends Controller
{
    public function index(){
    	
    	$services = Service::all();
    	$partners = Partner::all();
    	$actualities = Actuality::all();
    	$applicants = Applicant::all();
    	$accreditations = Accreditation::all();


    	return view('front.index', ['services'=>$services, 'actualities' => $actualities, 'applicants'=>$applicants, 'accreditations' => $accreditations, 'partners' => $partners]);
    }
}
