<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    


    public function index(){

        function random_color(){
        mt_srand((double)microtime()*1000000);
                $c = '';
                while(strlen($c)<6){
                    $c .= sprintf("%02X", mt_rand(0, 255));
                }
                return $c;
            }


        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                
                $events[] = Calendar::event(
                    $value->value."€ - ".$value->applicant['last_name']." ".$value->applicant['first_name'],
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                 [
                     'color'    => random_color(),
                     'url'      => route('applicant.show', ''.$value->applicant_id.'')
                 ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('back.calendar.fullcalender', compact('calendar'));
    }
}

