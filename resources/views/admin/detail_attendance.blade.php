@extends('admin/layout')

@section('content')
<style>
table,th, tr,td{
    border:1px solid red;
    padding: 12px;
}
</style>
<section class="container">
    <div><h1>Attendance</h1></div>
    {{$data->course}} <br> {{$data->semester}} <br> {{$data->section}} <br> {{$data->date}} <br>

    <?php 
        $a = $data->attendances;
        $unsec = unserialize($a);
      
       $counter = 1;
    ?>

<table>
        <thead>
            <th>S.N</th> <th>Roll No</th> <th>Name</th> <th>Attendance</th>
        </thead>
        <tbody>
        @foreach($unsec as $key=>$item)
    
    <tr>
    <td>{{$counter++}}</td>
   <td>{{$key}}</td>
   <td>
       @for($i=0; $i < count($student); $i++)
            @if($student[$i]->student_roll == $key)
                {{$student[$i]->student_name}}
            @endif
        @endfor

   </td>
   <td>{{$item}}</td>
  </tr>    
  
@endforeach
        </tbody>
    </table>
    
</section>
@stop