<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view(events.create);
    }

    public function store(Request $request) {
        $request->validate([
            'graphics' => 'required|mimes:jpg',
            'title' => 'required'
        ]);
        $event = new Event();
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->description = $request['description'];
        $event->category()->associate($request->category);
        $category = Category::firstOrCreate([
            'name' => $request['category'],
            'slug' => $request['category'],
        ]);
        $event->category_id = $request['category_name'];
        $event->created_by = auth()->user()->id;
        $graphics = $request->file('graphics');
        $path = public_path().'/images'.$graphics->getFilename().'.jpg';
        $graphics->move(public_path().'/images', $graphics->getFilename().'.jpg');
        $event->graphics = $path;
        $event->save();

        return redirect()->back()->with('message', 'Event added succesfully');
    }
}
