<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->ajax()) {
            $events = Event::select('id', 'title', 'date')->get();
            return response()->json($events);
        }
        
        return view('home');
    }
}
