@extends('admin/layout')
@section('content')
<style>
table,th,tr,td{
   padding:12px;
   border:1px solid red;
}
</style>
<script src="https://kit.fontawesome.com/579d7e70c7.js" crossorigin="anonymous"></script><div class="container-fluid">
   <h1>time table master</h1> <hr>
   <div>
      <form  action="/saveperiod_ajax" method="post">
      @csrf
         <div class="d-flex">
            <div  class="form-group">
               <label for="id">Course <samp style="color:red;">*</samp> :</label><br>
               <select name="course" id="course" required>
                  
                  <option value="<?php if(isset($data)) echo $data->faculty;?> "> <?php if(isset($data)) echo $data->faculty; else echo "faculty";?></option>
                 
                  <option value="Bsc.Csit">BSC.C.S.I.T</option>
                  <option value="BBA">BBA</option>
                  <option value="BBs">BBs</option>
                  
               </select>
            </div>
            <div class="form-group  px-4">
               <label for="">Select Semester / year <samp style="color:red;">*</samp> </label> <br>
               <select name="semester" id="semester">
                  
                  <option value="<?php if(isset($data)) echo $data->semester;?> "> <?php if(isset($data)) echo $data->semester; else echo "Select Semester";?></option>
                  
                  
                  @foreach($semesters as $sem)
                  <option value="{{$sem->semester_name}}">{{$sem->semester_name}}</option>
                  @endforeach
                  
               </select>
            </div>
            <div  class="form-group">
               <label for="id">Section <samp style="color:red;">*</samp> :</label><br>
               <select name="section" id="section" required>
                 
                  <option value="<?php if(isset($data->section)) echo $data->section;?> "> <?php if(isset($data->section)) echo $data->section; else echo "--section--";?></option>
                  
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                 
               </select>
            </div>
            <div class="form-group mx-4">
               <button class="btn" onclick="period();" >Get Class shedule</button>
               
                <a href="/add_period" class="float-right mx-3  btn btn-primary"><i class="fas fa-plus-square"></i> period</a>
               @if(isset($data))
                <button type="button" id="print" class="btn  mx-3 float-right " onclick="myfunction()"><i class="fas fa-print"></i></button>
               @endif
            </div>
         </div>
      </form>
     
   </div>
</div>
<div class="container " style="padding:2rem 10rem; align-item:center;">
@if(isset($data))
<table class="table w-100">
<tr>
<th style="dispaly:gride;">Days_/_period   </th>
      
<?php
if(isset($data->no_of_periods)){

   $a = $data->no_of_periods;
}else{
   $a = 8;
}
$subject = unserialize($data->class_sheduling);
$teacher = unserialize($data->teachers);
$start = unserialize($data->start);
$end = unserialize($data->end);


?>


@for($i = 1; $i <= $a; $i++)

<th >

 {{$i}} 
 
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
   {{$subject[$i][$j]}} <br>
   {{$teacher[$i][$j]}} <br>
   {{$start[$i][$j]}}-{{$end[$i][$j]}}

 </td>

@endfor

 </tr>
@endfor
</tbody>
</tr>

</table>
@endif
</div>

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script>
function period(){
   var _token = $("input[name='_token']").val();
   var course = $("#course").val();
   var semester = $("#semester").val();
   var section = $("#section").val();
   $.ajax({
      type: 'post',
      url: "{{route('saveperiod_ajax.post')}}",
      data: {
         _token :_token,
         semester : sem,
         course :course,
         section :section
      },
 success: function (response) {
    window.alert("response.success");
  //document.getElementById("total").value=response.success; 
 }

   });

}
function myfunction(){
  $('.container').printThis();
}
$('#print').click(function(){
  
  		 $('.container').printThis();
         
  	});
</script>


@stop