<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\student;
use App\models\faculty;
use App\models\semester;

class studentController extends Controller
{
    function look(){
      $data = semester::select('semester_name')->get();
      $faculty = faculty::select('faculty')->get();
      return view('/admin/add_students', ['semester'=>$data, 'faculty'=>$faculty]);
    }
    function addstudent(Request $req){
        $new = new student;
        $new->student_roll  = $req->input('std_id');
        $new->student_name = $req->input('name');
        $new->DOA = $req->input('doa');
        $new->DOB = $req->input('dob');
        $new->course_name = $req->input('course');
        $new->gender = $req->input('gender');
        $new->session = $req->input('session');
        $new->semester = $req->input('semester');
        $new->contact = $req->input('contact');
        $new->email = $req->input('email');
        $new->nationality = $req->input('nationality');
        $new->father_name = $req->input('father');
        $new->mother_name = $req->input('mother');
        $new->per_address = $req->input('per_address');
        $new->temp_address = $req->input('temp_address');
        $new->guardian_name = $req->input('guardian');
        $new->guardian_contact = $req->input('guardian_contact');
        
        $edu1 = $req->input('course1')."-".$req->input('passed1')."-".$req->input('percentage1')."-".$req->input('board1');
        $edu2 = $req->input('course2')."-".$req->input('passed2')."-".$req->input('percentage2')."-".$req->input('board2');
        $edu3 = $req->input('course3')."-".$req->input('passed3')."-".$req->input('percentage3')."-".$req->input('board3');
        $edu = $edu1."/".$edu2."/".$edu3;
        $new->academic_information = $edu;

        if($req->file('student_img')){
            $file= $req->file('student_img');
         $imgname= $req->input('name').uniqid();
           $file->getClientOriginalExtension();
           $file->getSize();
           $destinationPath = $file->move(public_path('image/student'), $imgname);
       

        }else{
            return "<script>alert('image not found;)</script>";
        }
        $new->image=$imgname;
      $new->save();
      $req->session()->flash('status',"new student has been added successfully");
      return redirect('/students');
       
    }

    function show(){
      $data = student::all();
      return view('/admin/students', ['data'=>$data]);
    }
    function detail($id){
      $data = student::find($id);
      return view('/admin/student_details', ['data'=>$data]);
    }
    
    function edit($id){
      $data = student::find($id);
      return view('/admin/add_students', ['data'=>$data]);
    }

    function update(Request $req){
      $update = student::find($req->input('id'));
      $update->student_roll  = $req->input('std_id');
      $update->student_name = $req->input('name');
      $update->DOA = $req->input('doa');
      $update->DOB = $req->input('dob');
      $update->course_name = $req->input('course');
      $update->gender = $req->input('gender');
      $update->session = $req->input('session');
      $update->semester = $req->input('semester');
      $update->contact = $req->input('contact');
      $update->email = $req->input('email');
      $update->nationality = $req->input('nationality');
      $update->father_name = $req->input('father');
      $update->mother_name = $req->input('mother');
      $update->per_address = $req->input('per_address');
      $update->temp_address = $req->input('temp_address');
      $update->guardian_name = $req->input('guardian');
      $update->guardian_contact = $req->input('guardian_contact');
      
      $edu1 = $req->input('course1')."-".$req->input('passed1')."-".$req->input('percentage1')."-".$req->input('board1');
      $edu2 = $req->input('course2')."-".$req->input('passed2')."-".$req->input('percentage2')."-".$req->input('board2');
      $edu3 = $req->input('course3')."-".$req->input('passed3')."-".$req->input('percentage3')."-".$req->input('board3');
      $edu = $edu1."/".$edu2."/".$edu3;
      $update->academic_information = $edu;

      if($req->file('student_img')){
        $imgWillDelete = public_path().'/image/student/'.$update->image;
        unlink($imgWillDelete);
1:23 PM 7/23/2021
        $file= $req->file('student_img');
        $imgname= $req->input('name').uniqid();
          $file->getClientOriginalExtension();
          $file->getSize();
          $destinationPath = $file->move(public_path('image/student'), $imgname);
          $update->image=$imgname;

      }
      
    $update->save();
    $req->session()->flash('status'," $update->student_name profile  has been update successfully");
    return redirect('/students');
    }
    function delete($id){
       $data = student::find($id);
       $imgWillDelete = public_path().'/image/student/'.$data->image;
        if(unlink($imgWillDelete)){
            student::find($id)->delete();
            session()->flash('status',"$data->student_name Record  deleted successfully");
            return redirect('/students');
        }
    }
}


