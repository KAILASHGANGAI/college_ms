
@extends('admin/layout')

@section('content')
<h1>Books Taken  </h1>
<div>
    <table class="table">
        <thead>
            <th>Id</th><th>Roll no.</th><th>student name</th> <th>faculty</th> <th>sem/yrs</th> <th>Book id</th> <th>Date</th> <th>Action</th>
        </thead>
        <tbody>
            @if(isset($data))
                @foreach($data as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->student_roll}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>
                            @foreach(unserialize($item->book_id) as $val)
                            <li>{{$val}}</li>
                            @endforeach
                        </td>
                        <td>{{$item->created_at}}</td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop