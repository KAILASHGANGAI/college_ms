@extends('admin/layout')

@section('content')
<div class="d-flex"> 
    <h2>Teachers List</h2> <a href="/add_teacher" class="btn btn-primary mx-2 ">add teacher</a>
</div><hr>
    <div class="container-fluid">
    @if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
            <div class="row">   
                @if($data)
                    @foreach($data as $item)
                    <div class="col-sm-2">
                    <a href="/detail_teacher/{{$item->id}}" class="nav-link shadow">
                    <img src="{{asset('image/teacher/'.$item->images)}}" class="img" alt="" height="140" width="140" srcset="">
                        <div class="p-2">
                            <span>{{$item->name}}</span>
                            <span>{{$item->contact}}</span><br>
                            <span>sub : {{$item->subject}}</span>
                        </div>
                    </a>
                </div>
                    @endforeach
                @endif
            </div>
    </div>


@stop