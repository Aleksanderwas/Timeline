<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Concerns\Events;

class EventController extends Controller
{
    public function index() {
        $last = DB::table('events')->
                        select('*')->
                        orderBy('start_date', 'desc')->get();
        return view('welcome',[
            'events' => $last
        ]);
    }

    public function find($id) {
        $event = DB::table('events')->where('id', '=', $id)->get()->first();
        return view('events.event', [
            'event' => $event
        ]);
    }

    public function create() {
        return view(events.create);
    }
}
