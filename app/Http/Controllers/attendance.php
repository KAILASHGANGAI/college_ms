<?php

namespace App\Http\Controllers;
use DB;
use nepali_calendar;
use Illuminate\Http\Request;
use App\models\student;
use App\models\semester;
use App\models\attendances;
class attendance extends Controller
{
    function show(){
        $data = semester::all();

        include(app_path().'\Http\Controllers\nepali_calendar.php');
        $cal = new Nepali_Calendar();

        $y = date("Y");
        $m = date("m");
        $d = date("d");

        $d =$cal->eng_to_nep($y,$m,$d);
        $date=$d['date'].'-'.$d['nmonth'].'-'.$d['year'];
        return view('/admin/attendance',['semesters'=>$data,'date'=>$date]);
    }
    function attendanceajax(){
        return view('/admin/attendance');
    }
    function  attendanceajaxpost(Request $req){
        $semesters = semester::select('semester_name')->get();
        $data = student::select('student_roll','student_name')->where('course_name', $req->course)->where('semester',$req->semester)->get();
         


        include(app_path().'\Http\Controllers\nepali_calendar.php');
        $cal = new Nepali_Calendar();

        $y = date("Y");
        $m = date("m");
        $d = date("d");

        $d =$cal->eng_to_nep($y,$m,$d);
        $date=$d['year'].'-'.$d['nmonth'].'-'.$d['date'];

        return view('/admin/attendance',[
            'data'=>$data,
             'semesters'=>$semesters,
             'course'=>$req->course,
             'sem'=>$req->semester,
             'date'=>$date
             
             ]);
        // return response()->json(            [
        //         //'semesters'=>$semesters,
        //         'data'=>'data'                
        //     ]);
    }

    function saveattendance(Request $req){
        include(app_path().'\Http\Controllers\nepali_calendar.php');
        $cal = new Nepali_Calendar();

        $y = date("Y");
        $m = date("m");
       
        $d = date("d");

         $d =$cal->eng_to_nep($y,$m,$d);
         if (mb_strlen((string) $d['month']) <= 1) {
               $mm = sprintf("%02d", $d['month']);
         }else{
            $mm =$d['month'];
         }
         $date=$d['year'].'-'.$mm.'-'.$d['date'];

        $arrayname = array();
        $absent = array();
      
         $course = $req->course;
         $semester = $req->semester;
         $roll = $req->student_roll;
         $attendance = $req->attendance;


         foreach($attendance as $id=>$value){
                 $arrayname[$roll[$id]] =$value ;
         }
          
         foreach ($arrayname as $key => $value) {
             if ($value == 'absent') {
                $absent[$key] =$value ;
             }
         }
         

        $new = new attendances;
        $new->course=$course;
        $new->semester=$semester;
        $new->section="A";
        $new->attendances= serialize($arrayname);
        $new->absent_attendances=serialize($absent);
        $new->date=$date;
        if ($new->save()) {
            $req->session()->flash('status',$course .' - '.$semester.' attendance has been saved');
            return redirect('/attendance');
        }



      }

      function showattendance(Request $req){
          $data = attendances::select('id','course','semester','section','date')->where('date',$req->input('date'))->get();
        
          return view('/admin/attendance_show',['data'=>$data]);
      }
      function detail_attendance($id){
          $data = attendances::find($id);
          $course = $data->course;
          $semester = $data->semester;
          $student = student::select('student_roll','student_name')->where('course_name',$course)->where('semester',$semester)->get();
          return view('/admin/detail_attendance',['data'=>$data, 'student'=>$student]);
      }
     
}
