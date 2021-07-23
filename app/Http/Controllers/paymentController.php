<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\models\student;
use App\models\payment;
use App\models\semester;
class paymentController extends Controller
{
    function show(){
        $data = semester::all();
        return view('/admin/payment',['semesters'=>$data]);
    }
    
    function add(Request $req){
        $fee_type ="";
        $new = new payment;
        $new->student_roll = $req->input('student_roll');
        $new->total_installment = $req->input('total_ins');
        $new->amount_deposited = $req->input('amount');
        $new->discount_amount = $req->input('discount');
        $new->total_amount_left = $req->input('total_ins') - $req->input('amount');
        $new->payment_method = $req->input('payment_method');
        foreach($req->input('fee') as $fee){
            $fee_type.= $fee."  ";
        }
         $new->fee = $fee_type;
        $new->received_by = $req->input('received_by');
        $new->date = date("Y/m/d");
         $student = DB::table('students')->where('student_roll',$req->input('student_roll'))->get();
          $student[0]->student_name;
      
        if ($new->save()) {
            return view('/admin/payment_bill',[
                   'name'=> $student[0]->student_name,
                   'roll'=> $student[0]->student_roll,
                   'course_name'=> $student[0]->course_name,
                   'session'=> $student[0]->session,
                   'semester'=> $student[0]->semester,
                   'payment_method'=>$req->input('payment_method'),
                   'date'=>date("Y/m/d"),
                   'total_installment'=>$req->input('total_ins'),
                   'amount'=>$req->input('amount'),
                   'discount'=>$req->input('discount'),
                   'fee'=>$fee_type,
                   'received'=>$req->input('received_by'),
                    'rec_no'=>$rec = payment::max('id')
            ]);
            
        }
       
    }
    function ajaxrequest(){
        return view('ajaxrequest');
    }

    function ajaxrequestpost(Request $req){
      
     $data = semester::find($req->get_option);
     $data_ins = $data->Installment;
   
        return response()->json(
            [
                'success'=>$data_ins
                
            ]
        );
    }
}
