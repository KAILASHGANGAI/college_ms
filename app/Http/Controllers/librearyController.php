<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\models\semester;
use App\models\faculty;
use App\models\libreary;
use App\models\student;
use App\models\books_taken;
class librearyController extends Controller
{
    function show(){
        $data = semester::select('semester_name')->get();
        $faculty = faculty::select('faculty')->get();
        return view('/admin/libreary/add_books',['semesters'=>$data,'faculty'=>$faculty]);
    }
    function add(Request $req){
       
        $new = new libreary ;
        $new->book_name = $req->input('name');
        $new->publication = $req->input('publication');
        $new->faculty = $req->input('faculty');
        $new->semester = $req->input('semester');
        $new->total = $req->input('total');

        if ($new->save()) {
            
            $req->session()->flash('status',$req->input('name') .' Books has been added to libreary');
            return redirect('/libreary details');
        }
    }

    function getdata(){
        $data = libreary::all();
        return view('/admin/libreary/libreary_show', ['data'=>$data]);
    }

    function edit($id){
        $sem = semester::select('semester_name')->get();
        $faculty = faculty::select('faculty')->get();
            $data = libreary::find($id);
            return view('/admin/libreary/add_books', ['data'=>$data,'semesters'=>$sem,'faculty'=>$faculty]);
        }

    function update(Request $req){
        $update = libreary::find($req->input('id'));
        $update->book_name = $req->input('name');
        $update->publication = $req->input('publication');
        $update->faculty = $req->input('faculty');
        $update->semester = $req->input('semester');
        $update->total = $req->input('total');
        if ($update->save()) {
            
            $req->session()->flash('status',$req->input('name').' Books has been updated');
            return redirect('/libreary details');
        }
    }

    function delete($id){
        $data = libreary::find($id);
        if($data->delete()){
            session()->flash('status',$data->book_name.' Books has been deleted');
            return redirect('/libreary details');
        }
    }


    public function search(Request $request){
    
        $data = libreary::where('book_name', 'LIKE', '%'.$request->input('search').'%')
                                ->orWhere('faculty', 'like', '%'.$request->input('search').'%')
                                ->orWhere('semester', 'like', '%'.$request->input('search').'%')
                                  ->get();      
                                  
                return view('/admin/libreary/take_books',['data'=> $data]);
  }

  function addbookto(Request $req){
            $student = student::select('id', 'student_name')->where('student_roll', $req->input('rollno'))->get();

            if(count($student) == 0){
                session()->flash('status',' Student Roll no doesnot exists. Try next');

                return redirect('/take_books');

            }else{
                 $new = new books_taken;
                 $new->student_roll = $req->input('rollno');
                 $new->book_id = serialize($req->input('addbook')) ;
                 if (empty($req->input('addbook'))) {
                    session()->flash('status','no book available');
                    return redirect('/libreary details');
                 }else{
                    foreach ($req->input('addbook') as $key => $value) {
                        $update = libreary::find($value);
                         $update->taken = $update->taken+1;
                         $update->save();
                    }
                }
                if($new->save()){
                    session()->flash('status','Books has been taken');
                    return redirect('/libreary details');
                }



            }

  }

  function return(){
      $data = books_taken::all();
      $student = student::select('id','student_roll', 'student_name')->get();
      
      $books = libreary::all();


      return view('/admin/libreary/return_books',['data'=>$data]);


  }
}
