@extends('admin/layout')

@section('content')
<style>
table,th, tr,td{
    border:1px solid red;
    padding: 12px;
}
</style>
<section class="container">
    <form action="/attendance_show" method="post" class="d-flex"> 
        @csrf
        <div class="form-group">
         <input type="text" id="nepali-datepicker" name="date" value="" placeholder="Select Nepali Date"/> 
        </div>
        <button class="px-3 mx-3 ">search</button>
    </form>
    <hr>
    @if(isset($data))
    <table boder="1">
    <tr>
        <th>S.N</th>
        <th>course</th>
         <th>sem</th>
         <th>sec</th>
         <th>Date</th>
        <th>Action</th>
       
    </tr>
    @foreach($data as $key=>$value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->course}}</td>
             <td>{{$value->semester}}</td> 
             <td>{{$value->section}}</td> 
             <td>{{$value->date}}</td> 
            <td><a href="/detail_attendance/{{$value->id}}">show</a></td>
        </tr>          
  @endforeach
    </table>
       
    @endif
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
 window.onload = function() {
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();
    };
    


</script>



@stop