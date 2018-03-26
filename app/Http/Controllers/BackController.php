<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Partner;
use App\Service;
use App\Actuality;
use App\Comment;

class BackController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        $partners = Partner::all();
        $services = Service::all();
        $actualities = Actuality::orderBy('created_at')->take(4)->get();
        $comments = Comment::orderBy('created_at')->take(4)->get();

        

        return view("back.index", [
        	'applicants'	=> $applicants, 
        	'partners'		=> $partners, 
        	'services'		=> $services, 
        	'actualities'	=> $actualities, 
        	'comments'		=> $comments
        ]);
    }
}
