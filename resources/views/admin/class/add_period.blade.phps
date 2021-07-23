@extends('admin/layout')
@section('content')
<style>
.select .form-group, .select select, .select input{
    width:100%;
}
</style>
<div class="container">
   <div class="row">
      <div class="col-sm-8 mx-auto  bg-secondary shadow p-5" >
      <h3 class="text-center text-white">Class sheduling</h3> <hr>
         <div>
            <form action="/add_period_save" method="post">
            @csrf
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
               <div class="d-flex select">
                  <div  class="form-group">
                     <label for="id">Period <samp style="color:red;">*</samp> :</label><br>
                     <select name="period" id="section" required>
                        <option value=" ">--period-- </option>
                        <option value="period 1">period 1</option>
                        <option value="period 2">period 2</option>
                        <option value="period 3">period 3</option>
                        <option value="period 4">period 4</option>
                        <option value="period 5">period 5</option>
                        <option value="period 6">period 6</option>
                        <option value="period 7">period 7</option>
                     </select>
                  </div>
                 <div  class="form-group mx-3">
                  <label for="id">Teacher <samp style="color:red;">*</samp> :</label><br>
                  <select name="teacher" id="teacher" required>
                     <option value=" ">--teacher-- </option>
                     <option value="Drr.mohan ">Dr.mohan</option>
                     <option value="ram shan">ram shan</option>
                     <option value="john don">john don</option>
                    
                  </select>
               </div>
               <div class="form-group">
                <label for="start time">Starting time</label><br>
                <input type="time" name="start" id="" required>
               </div>
               <div class="form-group">
                <label for="end time">End time</label><br>
                <input type="time" name="end" id="" required>
               </div>
            </div>
            <div class="d-flex">
                <div class="form-group w-100">
                    <label for="sub">Subject</label><br>
                    <input type="text" name="subject" id="" class="w-100" placeholder="enter subject name" required>
                </div>
                <div class="form-group w-100 px-4">
                   -----Days----- <br>
                    <input type="checkbox" name="sun" id="" value="sun" > Sunday <br> 
                    <input type="checkbox" name="mon" id="" value="mon"> Monday <br>
                    <input type="checkbox" name="tue" id="" value="tue"> Tuesday <br>
                    <input type="checkbox" name="wed" id="" value="wed"> Wednestay <br>
                    <input type="checkbox" name="thu" id="" value="thu"> Thursday<br>
                    <input type="checkbox" name="fri" id="" value="fri"> friday
                </div>
            </div>

         </div>
         <div class="form-group ">
         <button class="btn float-right">--Save--</button>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
@stop