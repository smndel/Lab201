<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Partner;
use App\Service;
use App\Actuality;
use App\Comment;
use App\Event;
use Carbon\Carbon;

class BackController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        $partners = Partner::all();
        $services = Service::all();
        $actualities = Actuality::orderBy('created_at')->take(4)->get();
        $comments = Comment::orderBy('updated_at')->take(4)->get();
        $new_comments = Comment::all()->where('updated_at', '>', Carbon::yesterday()->toDateString())->count('comment');
        $pending_payments = Event::all()->where('start_date', '>', Carbon::today()->toDateString())->sum('value');

        return view("back.index", [
        	'applicants'	   => $applicants, 
        	'partners'		   => $partners, 
        	'services'		   => $services, 
        	'actualities'	   => $actualities, 
        	'comments'		   => $comments,
            'pending_payments' => $pending_payments,
            'new_comments'     => $new_comments
        ]);
    }
}
