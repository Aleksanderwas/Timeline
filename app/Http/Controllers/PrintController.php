<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function printview() {
        $events = Event::all()->sortBy('start_date');
        $pdf = PDF::loadView('printview', compact('events'))->save('timeline.pdf');
//        return $pdf->download('timeline.pdf');
        return view('printview', ['events' => $events]);
    }
}
