<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;


class FrontController extends Controller
{
    public function index(){
    	
    	$services = service::paginate(5);

    	return view('front.index', ['services'=>$services]);
    }
}
