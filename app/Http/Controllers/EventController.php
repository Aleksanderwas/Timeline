<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function Sodium\increment;

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
        $event = Event::where('id', $id)->first();
        return view('events.event', [
            'event' => $event
        ]);
    }

    public function create() {
        return view('events.create');
    }

    public function categories() {
        $categories = Category::select('name')->get();
        return view('category.index', ['categories' => $categories]);
    }

    public function get_category ($name) {
        $events = Event::all();
        $cat_events = [];
        foreach($events as $event){
            if($event->category->name == $name){
                $cat_events[] = $event;
            }
        }
        return view("category.name", ["events" => $cat_events]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'graphics' => 'mimes:jpg'
        ]);
        if($request['start_date'] > $request['end_date']){
           return redirect()->back()->with('message', 'Start date have to be lower than end date');
        }
        $event = new Event();
        $this->check_category($event, $request);
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->description = $request['description'];
        $event->created_by = auth()->user()->id;
        if(isset($request['graphics'])) {
            $this->add_graphics($event, $request);
        }
        $event->save();

        return redirect()->back()->with('message', 'Event added succesfully');
    }

    public function add_graphics($event, $request) {
        $graphics = $request->file('graphics');
        $path = '/images/'.$graphics->getFilename().'.jpg';
        $graphics->move(public_path().'/images', $graphics->getFilename().'.jpg');
        $event->graphics = $path;
    }

    public function check_category($event, $request) {
        if (!Category::where('name', $request['category'])->exists()) {
            $event->category()->associate($request->category);
            Category::firstOrCreate([
                'name' => $request['category'],
                'id' => DB::getPdo()->lastInsertId() + 1
            ]);
            $event->category_id = DB::getPdo()->lastInsertId();
        }
        else {
            $category = Category::where('name', $request['category'])->get()->first();
            $event->category_id = $category->id;
        }
    }
    public function update($event, Request $request) {
        $event = Event::where('id', $event)->first();
        $this->check_category($event, $request);
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->description = $request['description'];
        if(isset($request['graphics'])) {
            $this->add_graphics($event, $request);
        }
        $event->save();
        return redirect()->back()->with('message', 'Event modified succesfully');
    }
    public function destroy($id) {
        Event::destroy($id);
        return Redirect::route('home');
    }
    public function modify($event) {
        $event = Event::where('id', $event)->first();
        return view('events.update')->with('event', $event);
    }
}
