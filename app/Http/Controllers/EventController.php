<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Interfaces\EventRepositoryInterface;
use App\Jobs\SendEventCreatedEmail;
use App\Jobs\SendEventDeletedEmail;
use App\Jobs\SendEventUpdateEmail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    private EventRepositoryInterface $eventRepositoryInterface;

    public function __construct(EventRepositoryInterface $eventRepositoryInterface)
    {
        $this->eventRepositoryInterface = $eventRepositoryInterface;
    }
    public function index()
    {

        try {
            $data = $this->eventRepositoryInterface->index();
            $events = Event::whereIn('id', $data->pluck('id'))->paginate(5);
            return view('events.index', compact('events'));
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Unable to fetch data.');
        }
    }

    public function create()
    {
        return view('events.create');
    }
    public function store(StoreEventRequest $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ];
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $event = $this->eventRepositoryInterface->create($data);

            // Send email notification
            SendEventCreatedEmail::dispatch($event, $user);;


            DB::commit();

            return redirect('/events')->with('success', 'Event added Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errors');
        }
    }

    public function destroy($id)
    {
        try {


            $user = Auth::user();
            $event = $this->eventRepositoryInterface->getById($id);

            $this->eventRepositoryInterface->delete($id);

            // Send email notification
            SendEventDeletedEmail::dispatch($event, $user);

            return redirect('/events')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return redirect('/events')->with('error', 'Something went wrong');
        }
    }


    public function edit($id)
    {
        $events = Event::find($id);
        return view('events.edit', compact('events'));
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ];
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $this->eventRepositoryInterface->update($updateData, $id);

            // Send email notification
            $event = $this->eventRepositoryInterface->getById($id);
            SendEventUpdateEmail::dispatch($event, $user);

            DB::commit();
            return redirect('/events')->with('success', 'Event Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    public function show($id)
    {
        $event = $this->eventRepositoryInterface->getById($id);

        return view('events.show', compact('event'));
    }
}
