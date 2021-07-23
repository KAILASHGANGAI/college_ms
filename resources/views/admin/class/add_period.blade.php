@extends('admin/layout')

@section('content')
<style>
table, th , tr, td{
   text-align:center;
    border:1px solid blue;
}
input[type="text"]{
    
    width:100%;
    height:20px;
    color:red;
    }
    input[type="time"]{
    
    width:100%;
    height:20px;
    color:blue;
    }
</style>
<?php 

if (isset($_GET['p'])) {
   $p = $_GET['p'];
} 

?>
<div class="">

<h2>Class Sheduling</h2> <p id="demo"> </p>
<form action="/add_period_save" method="post">@csrf 

<div class="d-flex select">
                  <div  class="form-group">
                     <label for="id">Course <samp style="color:red;">*</samp> :</label><br>
                     <select name="course" id="course" required>
                        @if(isset($course))
                        <option value="<?php if(isset($course)) echo $course;?> "> <?php if(isset($course)) echo $course;?></option>
                        @else
                        <option value=" "> faculty </option>
                        <option value="Bsc.Csit">BSC.C.S.I.T</option>
                        <option value="BBA">BBA</option>
                        <option value="BBs">BBs</option>
                        @endif
                     </select>
                  </div>
                  <div class="form-group  px-4">
                     <label for="">Select Semester / year <samp style="color:red;">*</samp> </label> <br>
                     <select name="semester" id="semester" required>
                        @if(isset($sem))
                        <option value="<?php if(isset($sem)) echo $sem;?> "> <?php if(isset($sem)) echo $sem;?></option>
                        @else
                        <option value=" ">Select Semester</option>
                        @foreach($semesters as $sem)
                        <option value="{{$sem->semester_name}}">{{$sem->semester_name}}</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
                  <div  class="form-group">
                     <label for="id">Section <samp style="color:red;">*</samp> :</label><br>
                     <select name="section" id="section" required>
                        @if(isset($section))
                        <option value="<?php if(isset($section)) echo $section;?> "> <?php if(isset($section)) echo $section;?></option>
                        @else
                        <option value=" ">--section-- </option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        @endif
                     </select>
                  </div>
               </div>

<div>
    <button class="float-right mx-5 px-5 my-3" type="submit" >save</button>
</div>
<table>
<tr>
<th style="dispaly:gride;">Days_/_period  <select name="pri"  class="w-100" onchange="noofperiod(this.value)">
               <option value="<?php if(isset($p)) echo $p; else echo "no of p";?>"><?php if(isset($p)) echo $p; else echo "no of p";?></option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
        </select> </th>
      
<?php
if(isset($p)){

   $a = $p;
}else{
   $a = 8;
}


?>
@for($i = 1; $i <= $a; $i++)

<th >

 {{$i}} <input type="checkbox" value="{{$i}}" id="all[{{$i}}]" onclick="myfunction(this.value);"> all 	&#8595
 
 </th>
@endfor
<tbody>
@for($i = 1; $i < 7; $i++)
<tr>
 <td>
@if($i == 1) Sun @endif
@if($i == 2) mon @endif
@if($i == 3) tue @endif
@if($i == 4) wed @endif
@if($i == 5) thu @endif
@if($i == 6) fri @endif
 
 
 
 </td> 
 @for($j = 1; $j <= $a; $j++)

<td>
<div class="p-2">
<input type="text"  name="sub[{{$i}}][{{$j}}]" id="subject{{$i}}{{$j}}" placeholder="sub">
<input type="text" name="teacher[{{$i}}][{{$j}}]" id="teacher{{$i}}{{$j}}" placeholder="teacher">
<input type="time" name="start[{{$i}}][{{$j}}]" id="start{{$i}}{{$j}}" placeholder="time">
<input type="time" name="end[{{$i}}][{{$j}}]" id="end{{$i}}{{$j}}" placeholder="time">
</div>
 </td>

@endfor

 </tr>
@endfor
</tbody>
</tr>

</table>


</form>
</div>
  
<script>
function myfunction(e) {
    
         var sub = document.getElementById("subject"+1+e).value;
         var tea = document.getElementById("teacher"+1+e).value;
         var start = document.getElementById("start"+1+e).value;
         var end = document.getElementById("end"+1+e).value;

    for (let i = 1; i < 7 ; i++){
        document.getElementById('subject'+i+e).value = sub;
        document.getElementById('teacher'+i+e).value = tea;
        document.getElementById('start'+i+e).value = start;
        document.getElementById('end'+i+e).value = end;
        
        
    }




}
</script>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script>

function noofperiod(val)
{
  
   var _token = $("input[name='_token']").val();

        $.ajax({
           
           type:'POST',
           url:"{{ route('ajaxRequest_period.post') }}",
           data: {
         _token :_token,
         period : val,
         
         },
        success:function(data){
          var noofp = data.success; 
         
         window.location='/add_period?p='+data.success;

         }

        });
 }
</script>

@stop