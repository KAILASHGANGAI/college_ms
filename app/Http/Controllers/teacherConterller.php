<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\teacher;

class teacherConterller extends Controller
{

    function add(Request $req){

        $new = new teacher;
       $new->name = $req->input('name'); 
       $new->address = $req->input('address'); 
       $new->contact = $req->input('contact');
       $new->email = $req->input('email');
       $new->subject = $req->input('subject');
       $new->bloodgroup = $req->input('bloodgroup');
       $new->dob = $req->input('dob');
       $new->experience = $req->input('experience');
       $new->salary = $req->input('salary');
       $new->join_date = $req->input('join');
   
       $edu1 = $req->input('course1')."-".$req->input('passed1')."-".$req->input('percentage1')."-".$req->input('board1');
       $edu2 = $req->input('course2')."-".$req->input('passed2')."-".$req->input('percentage2')."-".$req->input('board2');
       $edu3 = $req->input('course3')."-".$req->input('passed3')."-".$req->input('percentage3')."-".$req->input('board3');
       $edu4 = $req->input('course4')."-".$req->input('passed4')."-".$req->input('percentage4')."-".$req->input('board4');
       $edu = $edu1."/".$edu2."/".$edu3."/".$edu4;
       $new->education = $edu;

       if($req->file('img')){
           $file= $req->file('img');
         $imgname= $req->input('name').uniqid();
          $file->getClientOriginalExtension();
          $file->getSize();
          $destinationPath = $file->move(public_path('image/teacher'), $imgname);
      

       }else{
        $req->session()->flash('status',"img not loaded");
        return redirect('/teachers');
       }
       $new->images=$imgname;
       if ($new->save()) {
        $req->session()->flash('status',"new student has been added successfully");
        return redirect('/teachers');
       }else{
        $req->session()->flash('status',"Process failed");
        return redirect('/teachers');


       }
    }

    function show(){
        $data = teacher::all();
        return view('/admin/teacher/teacher', ['data'=>$data]);
    }
    function detail($id){
        $data = teacher::find($id);
        return view('/admin/teacher/detail_teacher',['data'=>$data]);
    }
    function delete($id){
       return $id;
         view('/admin/teacher/detail_teacher',['data'=>$data]);
    }
    function edit($id){
        $data = teacher::find($id);
        return view('/admin/teacher/add_teacher',['data'=>$data]);
    }
    function update(Request $req){
           
        $update =teacher::find($req->input('id'));
       $update->name = $req->input('name'); 
       $update->address = $req->input('address'); 
       $update->contact = $req->input('contact');
       $update->email = $req->input('email');
       $update->subject = $req->input('subject');
       $update->bloodgroup = $req->input('bloodgroup');
       $update->dob = $req->input('dob');
       $update->experience = $req->input('experience');
       $update->salary = $req->input('salary');
       $update->join_date = $req->input('join');
   
       $edu1 = $req->input('course1')."-".$req->input('passed1')."-".$req->input('percentage1')."-".$req->input('board1');
       $edu2 = $req->input('course2')."-".$req->input('passed2')."-".$req->input('percentage2')."-".$req->input('board2');
       $edu3 = $req->input('course3')."-".$req->input('passed3')."-".$req->input('percentage3')."-".$req->input('board3');
       $edu4 = $req->input('course4')."-".$req->input('passed4')."-".$req->input('percentage4')."-".$req->input('board4');
       $edu = $edu1."/".$edu2."/".$edu3."/".$edu4;
       $update->education = $edu;

       if($req->file('img')){
           $file= $req->file('img');
         $imgname= $req->input('name').uniqid();
          $file->getClientOriginalExtension();
          $file->getSize();
          $destinationPath = $file->move(public_path('image/teacher'), $imgname);
          $update->images=$imgname;

       }
     
       if ($update->save()) {
        $req->session()->flash('status',$req->input('name')." details been added successfully");
        return redirect('/teachers');
       }else{
        $req->session()->flash('status',"Process failed");
        return redirect('/teachers');

       }
    }
}