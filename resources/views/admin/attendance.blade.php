@extends('admin/layout')

@section('content')

<section class="container">
    <div>
    <h1>Attendance  <a class="btn btn-success " href="/attendance_show">show attendance</a></h1>   <span class="float-right p-2">DATE :@if(isset($date)) {{$date}} @endif</span> </div> <hr>
    <div>
    @if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
    <form action="#" method="post">
    @csrf
    
    <div class="d-flex">
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
                   <select name="semester" id="semester">
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
                            <div class="form-group">
                                <button class="btn" onclick="myfunction();" >Get Students</button>
                            
                            </div>
                            
                </div>
    
    </form>

    <form action="/saveattendance" method="post">
       @csrf
    
               <div>
                    <input type="submit" class="float-right px-5 mx-4 mb-2" onclick="savefunction();" value="Save Attendance">
                <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>S.N.</th> <th>Roll_No</th> <th>Name</th> <th><input type="checkbox" class="add-attr" id="female" name="attendance" value="1"> Attendance</th>


                </tr>
                </thead>
                <tbody>
                   @if(isset($data))
                        @foreach($data as $key=>$val)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$val->student_roll}} <input type="hidden" name="student_roll[]" value="{{$val->student_roll}}"> </td>
                            <td>{{$val->student_name}}</td>
                            <td>
                                <input type="radio" class="preasent" name="attendance[{{$key}}]" id="" value="present" required>  present                            
                                <input type="radio" name="attendance[{{$key}}]" id="" value="absent" required> absent                             
                            </td>
                        </tr>
                        @endforeach
                   @endif

                </tbody>
                </table>
            
            </div>
            @if(isset($data))
            <input type="hidden" name="course" value="{{$course}}">
            <input type="hidden" name="semester" value="{{$sem}}">
            @endif
        </form>
    </div>

</section>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script>

$(document).ready(function(){
        $(".add-attr").click(function(){            
            $(".preasent").attr("checked", "checked");
        });
    });
</script>
<script>
function myfunction(){
   
  var sem = document.getElementById("semester").value;
  var course = document.getElementById("course").value;
  if (sem != " " || course != " ") {
$.ajax({
    var _token = $("input[name='_token']").val();
type: 'post',
url: "{{route('attendanceajax.post')}}",
data: {
    _token :_token,
    semester : sem,
    course :course
},
success: function (response) {
   window.alert('response.data');
 //document.getElementById("total").value=response.success; 
}
});
return false;

  }else{
      alert("Select course and semester");
  }
  

}

$(document).ready(function() {



function savefunction(){
    var course = $('#semester').val();
    var semester = $('#semester').val();
    var attend = $('#attendance').val();
    var _token = $("input[name='_token']").val();
 $.ajax({

 type: 'post',
 url: "{{route('saveajax.post')}}",
 data: {
     _token :_token,
     semester : sem,
    course :course,
    attendance :attend
 },
 success: function (response) {
    window.alert(response.success);
  //document.getElementById("total").value=response.success; 
 }
 });
    
}
</script>
@stop