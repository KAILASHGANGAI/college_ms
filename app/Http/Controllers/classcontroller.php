<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\semester;
use App\models\class_m;

class classcontroller extends Controller
{
    function show(){
        $semesters = semester::all();
        return view('/admin/class/class_manage',['semesters'=>$semesters]);
    }
    function period(){
        $semesters = semester::all();
        return view('/admin/class/add_period',['semesters'=>$semesters]);
    }
    function save(Request $req){
   
          $new = new class_m ;
        $new->faculty = $req->input('course');					
        $new->semester = $req->input('semester');
        $new->section = $req->input('section');
        $new->no_of_periods = $req->input('pri');
        $new->class_sheduling = serialize($req->input('sub'));
        $new->teachers = serialize($req->input('teacher'));
        $new->start = serialize($req->input('start'));
        $new->end = serialize($req->input('end'));
        if ($new->save()) {
            $semesters = semester::all();
            $data = class_m::select('faculty','semester','section','no_of_periods','class_sheduling','teachers', 'start','end')->where('faculty',$req->input('course'))->where('semester',$req->input('semester'))->where('section',$req->input('section'))->first();
            return view('/admin/class/class_manage',['data'=>$data,'semesters'=>$semesters]);
        }else{
            return redirect('/class_manage');
        }
       
    }
      function ajaxRequest_p()
     {
         return view('ajaxRequest_p');
     }
     function ajaxperiod( Request $req){

        $data = $req->period;
   
        return response()->json(
            [
                'success'=>$data
                
            ]
        );

    }

    function getperiod(Request $req){
        $semesters = semester::all();
        $data = class_m::select('faculty','semester','section','no_of_periods','class_sheduling','teachers', 'start','end')->where('faculty',$req->input('course'))->where('semester',$req->input('semester'))->where('section',$req->input('section'))->first();
       
      
        if ($data == null) {
            return redirect('/class_manage');
        }
        return view('/admin/class/class_manage',['data'=>$data,'semesters'=>$semesters]);

    }
}
