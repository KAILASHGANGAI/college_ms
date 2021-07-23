
@extends('admin/layout')

@section('content')
<div>
<h4>Take books</h4>

<form action="/take_book_search" method="post">@csrf
<div class="input-group mb-3" >
    <input type="text" class="form-search" name="search" placeholder="  Search book">
<div class="input-group-append">
    <button class="btn btn-success" type="submit">Go</button>
</div>
</div>
</form>
</div><hr>

<div>
    <div>
    @if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
        <form action="/addbooks_to" method="post">
        @csrf
        <div>
                <input type="text" class="my-3" name="rollno" id="" placeholder="student Roll Number" required> 

                <button type="submit" class="px-4 py-1">
                                   save 
                                </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th> <th>name</th> <th>faculty</th> <th>sem/year</th> <th>Available</th><th>Add to <input type="checkbox"  name="" id="selectall"></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->book_name}}</td>
                            <td>{{$item->faculty}}</td>
                            <td>{{$item->semester}}</td>
                            <td><?php $left = $item->total - $item->taken; if ($left == 0) {echo " no book available";}else{
                                echo $left;
                            } ?></td>
                            @if($left !=0)
                            <td><input type="checkbox" name="addbook[]" value="{{$item->id}}" id="checkItem"></td>
                            @else
                            <td>cannot select</td>
                            @endif
                        </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </form>
    </div>
</div>
<script src="{{asset('/js/jquery.min.js')}}"></script>

<script>
$('#selectall').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    
 });
</script>
@stop