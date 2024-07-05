<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Interfaces\EventRepositoryInterface;
use App\Classes\ApiResponse;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    private EventRepositoryInterface $eventRepositoryInterface;
    
    public function __construct(EventRepositoryInterface $eventRepositoryInterface)
    {
        $this->eventRepositoryInterface = $eventRepositoryInterface;
    }
    
    //Retrieve a list of all events
    public function index()
    {
        $data = $this->eventRepositoryInterface->index();

        return ApiResponse::sendResponse(EventResource::collection($data),'',200);
    }

    //Create a new event
    public function store(StoreEventRequest $request)
    {
        $data =[
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ];
        DB::beginTransaction();
        try{
             $event = $this->eventRepositoryInterface->create($data);

             DB::commit();
             return ApiResponse::sendResponse(new EventResource($event),'Event Created Successfully',201);

        }catch(\Exception $e){
            return ApiResponse::rollback($e);
        }
    }

    //Retrieve details of a specific event
    public function show($id)
    {
        $event = $this->eventRepositoryInterface->getById($id);

        return ApiResponse::sendResponse(new EventResource($event),'',200);
    }


    //Update an existing event
    public function update(UpdateEventRequest $request, $id)
    {
        $updateData =[
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ];
        DB::beginTransaction();
        try{
             $events = $this->eventRepositoryInterface->update($updateData,$id);

             DB::commit();
             return ApiResponse::sendResponse('Event Updated Successfully','',201);

        }catch(\Exception $e){
            return ApiResponse::rollback($e);
        }
    }

    //Delete an event
    public function destroy($id)
    {
         $this->eventRepositoryInterface->delete($id);

        return ApiResponse::sendResponse('Event Deleted Successfully','',200);
    }
}
