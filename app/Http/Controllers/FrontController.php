<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Partner;
use App\Applicant;
use App\Actuality;
use App\Reference;



class FrontController extends Controller
{
    public function index(){
    	
    	$services = Service::all();
    	$partners = Partner::all();


    	return view('front.index', ['services'=>$services]);
    }
}
