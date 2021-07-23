<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\staff;

class staffConterller extends Controller
{
    function add(Request $req){

        $new = new staff;
       $new->name = $req->input('name'); 
       $new->address = $req->input('address'); 
       $new->contact = $req->input('contact');
       $new->work = $req->input('work');
       $new->bloodgroup = $req->input('bloodgroup');
       $new->dob = $req->input('dob');
       $new->experience = $req->input('experience');
       $new->salary = $req->input('salary');
       $new->join_date = $req->input('join'); 

       if($req->file('img')){
           $file= $req->file('img');
         $imgname= $req->input('name').uniqid();
          $file->getClientOriginalExtension();
          $file->getSize();
          $destinationPath = $file->move(public_path('image/staff'), $imgname);
      

       }else{
        $req->session()->flash('status',"img not loaded");
        return redirect('/staff');
       }
       $new->images=$imgname;
       if ($new->save()) {
        $req->session()->flash('status',"new Staff has been added successfully");
        return redirect('/staff');
       }else{
        $req->session()->flash('status',"Process failed");
        return redirect('/staff');


       }
    }

    function show(){
        $data = staff::all();
        return view('/admin/staff/staff', ['data'=>$data]);
    }
    function detail($id){
        $data = staff::find($id);
        return view('/admin/staff/detail_staff',['data'=>$data]);
    }
    function delete($id){
        $data = staff::find($id);

        $imgWillDelete = public_path().'/image/staff/'.$data->images;
               
        if (unlink($imgWillDelete)) {
            $data->delete();
            return redirect('/staff')->with('status',"Staff Record deleted");
        }else{
            return redirect('/staff')->with('deletion failed');
   
        }
    }
    function edit($id){
        $data = staff::find($id);
        return view('/admin/staff/add_staff',['data'=>$data]);
    }
    function update(Request $req){
           
        $update =staff::find($req->input('id'));
       $update->name = $req->input('name'); 
       $update->address = $req->input('address'); 
       $update->contact = $req->input('contact');
       $update->work = $req->input('work');
       $update->bloodgroup = $req->input('bloodgroup');
       $update->dob = $req->input('dob');
       $update->experience = $req->input('experience');
       $update->salary = $req->input('salary');
       $update->join_date = $req->input('join');
       if($req->file('img')){
            $imgWillDelete = public_path().'/image/staff/'.$update->images;
            unlink($imgWillDelete);
           $file= $req->file('img');
         $imgname= $req->input('name').uniqid();
          $file->getClientOriginalExtension();
          $file->getSize();
          $destinationPath = $file->move(public_path('image/staff'), $imgname);
          $update->images=$imgname;

       }
     
       if ($update->save()) {
        $req->session()->flash('status',$req->input('name')." details been Updated successfully");
        return redirect('/staff');
       }else{
        $req->session()->flash('status',"Process failed");
        return redirect('/staff');

       }
    }   
}
