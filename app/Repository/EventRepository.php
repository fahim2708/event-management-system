<?php

namespace App\Repository;

use App\Models\Event;
use App\Interfaces\EventRepositoryInterface;
class EventRepository implements EventRepositoryInterface
{
    public function index(){
        return Event::all();
    }

    public function getById($id){
       return Event::findOrFail($id);
    }

    public function create(array $data){
       return Event::create($data);
    }

    public function update(array $data,$id){
       return Event::findOrFail($id)->update($data);
    }
    
    public function delete($id){
        Event::findOrFail($id)->delete();
    }
}