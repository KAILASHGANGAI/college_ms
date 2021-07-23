<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\event;

class eventController extends Controller
{
     function index(){
    $data = event::all();
    return view('/admin/event/event', ['data'=>$data]);
}

public function create()
{
    return view('/events');
}

public function store(Request $request)
{   
    $new = new event;
    $new->event_name = $request->input('event_name');
    $new->description = $request->input('description');
    $new->task_date = $request->input('date');
    if($new->save()){
    return view('/admin/event/event');
    }
}
}
