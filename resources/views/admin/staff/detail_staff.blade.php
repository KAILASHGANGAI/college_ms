@extends('admin/layout')

@section('content')
<style>
.table td, .table th {
    padding:4px;
    border:1px solid black;s;
    margin:2px;
}

</style>
<div class="container">
    <div>
        <h3>staff Detail</h3> <hr>
    </div>
    <div class="row">
        <div class="col-sm-12 mx-auto">
             
    @if(isset($data))
        <div class="d-flex px-5"> 
        <div class="shadow text-center p-2" style="height: fit-content;">
        <img src="{{asset('image/staff/'.$data->images)}}"  class="img" height="200" alt="">
        <a href="/delete_staff/{{$data->id}}" class="btn btn-danger w-100 my-4">Delect</a>
        <a href="/edit_staff/{{$data->id}}" class="btn btn-warning w-100">Edit</a>
        </div>
            <div class="px-5 w-100">
                <table class="table table-hover w-100">
                <tr><th colspan="2" class="text-center p-3">Personal details</th></tr>
                    <tr> <td>Name :</td> <td>{{$data->name}}</td>  </tr>
                    <tr><td>Address :</td>   <td>{{$data->address}}</td></tr>
                    <tr><td>contact :</td>   <td>{{$data->contact}}</td></tr>
         
                    <tr><td>work :</td>   <td>{{$data->work}}</td></tr>
                    <tr><td>Date Of Birth :</td>   <td>{{$data->dob}}</td></tr>
                    <tr><td>Blood Group :</td>   <td>{{$data->bloodgroup}}</td></tr>
                    <tr><td>Experience :</td>   <td>{{$data->experience}}</td></tr>
                    <tr><td>Salary ( per month ) :</td>   <td>{{$data->salary}} /-</td></tr>
                    <tr><td>Join Date ( A.d ) :</td>   <td>{{$data->join_date}} </td></tr>
                </table>
            </div>
          
          
      
        </div>

    @endif
        
        </div>
    </div>

</div>
@stop