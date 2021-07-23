@extends('admin/layout')

@section('content')
<style>
th{
    padding:6px 10px;
}
</style>

<section>
<div class="mx-3 d-flex mb-2">      
<div class="input-group mb-3" >
    <input type="text" class="form-search" placeholder="  Search students">
<div class="input-group-append">
    <button class="btn btn-success" type="submit">Go</button>
</div>
<a href="add_students" class="btn btn-success mx-5 float-right">Add_Students</a>

</div>

</div>
@if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<div class="table-responsive">
<table class="table table-bordered table-sm">
<thead>
    <tr>
            <th>Id</th> <th>Students_Roll</th> <th>Student_Name</th><th>Contact</th><th>Permanent_Address</th>
            <th>Date_Of_Birth</th><th>Course</th><th>Session</th><th>Semester</th><th>Action</th>
            
    </tr>
</thead>
<tbody>

@foreach($data as $item)
<tr>
    <td><a href="student_details/{{$item->id}}">{{$item->id}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->student_roll}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->student_name}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->contact}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->per_address}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->DOB}}</a></td>
     <td><a href="student_details/{{$item->id}}">{{$item->course_name}}</a></td> 
     <td><a href="student_details/{{$item->id}}">{{$item->session}}</a></td>
    <td><a href="student_details/{{$item->id}}">{{$item->semester}}</a></td> 
    <td><a href="/student_delete/{{$item->id}}" class="text-danger">D</a> <a href="/student_edit/{{$item->id}}">E</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
</section>

@stop