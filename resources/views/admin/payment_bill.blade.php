@extends('admin/layout')

@section('content')
<style>
body{
    height: auto;
}
@page{
  size: auto;   /* auto is the initial value */

/* this affects the margin in the printer settings */
margin: 20mm 20mm 20mm 20mm; 
}
tr, td, th{
    padding:12px;s
}
.borders{
    border-top:2px solid black;
    padding:12px;
}
.cir{
    border : 1px solid red;
    border-radius:7px;
    padding:4px;
}
</style>
<section class="container-fluid">
    <div class="container w-75 border p-5">
            <table class="border table ">
                    <tr >
                            <div class="d-flex  text-center">
                             <img src="{{asset("image/AIMS.png")}}" width="200" alt="">
                                <div >
                                
                                <h3>ALLIANCE FOR INNOVATIVE MANAGEMENT AND SOCIAL STUDIES COLLEGE </h3>
                            <span>Biratnagar-9, morang, Nepal 021-577060</span>
                                </div>
                            </div>
                    </tr><hr> 
                    <tr>
                        <h2 class="text-center" style="color:darkgray;">Receipt</h2>
                        <span>PAN : 305675770</span> <br>
                        <span>Receipt No. : {{$rec_no}}</span>

                    </tr><hr>
                    <tr>
                        <span>Name : {{$name}}</span><br>
                        <span>faculty : {{$course_name}}</span><br>
                        <span>Semester : {{$semester}}</span><br>
                        <span>Roll No. : {{$roll}}</span><br>
                        <span>Payment Method : {{$payment_method}}</span><br>
                        <span>Date : {{$date}}</span> <br><br><br>
                        <b>Received By : {{$received}}</b>
                        
                    </tr><hr>
                    <tr> 
                    <b><u>Total Installment To be Paied : Rs. {{$total_installment}} /-</u></b> <br>

                     </tr>
                    <tr>
                        <table class="tables">
                            <tr>
                                <th>S.N</th> <th>Fee</th> <th>Discount (Rs.)</th> <th>Amount (Rs.)</th>
                            </tr>
                            <tr>
                                <td>1</td> <td>{{$fee}}</td> <td>{{$discount}}</td> <td>{{$amount}}</td>
                            </tr>
                            <tr colspan="2" class="borders">
                                <td colspan="3" class="text-right">Total Amount :</td> <td>{{$amount}} /-</td>
                            </tr>
                            <tr colspan="2" class="borders">
                                <td colspan="3"><b>Received Amount :-</b></td> <td>thirty thousand only .</td>
                            </tr>
                            <tr colspan="4">
                                 <td colspan="4" class="cir"><span>Due left: <span class="float-right">{{$total_installment - $discount-$amount}}/-</span></span></td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                    <div class="float-right p5-3">
                    <span class="borders">signature</span>            
            </div>
                    </tr>
            </table>
            
    </div>
    
    <button type="button" id="print" class="btn btn-primary float-right mr-5" onclick="myfunction()">print now</button>

</section>
<script>
function myfunction(){
  $('.container').printThis();
}
$('#print').click(function(){
  
  		 $('.container').printThis();
  	});
    </script>
@stop