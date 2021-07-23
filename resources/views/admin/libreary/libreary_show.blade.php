@extends('admin/layout')

@section('content')
<div class="d-flex"> 
    <h2>Libreary Details</h2>
     <a href="/add_books" class="btn btn-primary mx-2 ">Add Books</a>
     <a href="/take_books" class="btn btn-warning mx-2 ">Take Books</a>
     <a href="/return_books" class="btn btn-success mx-2 ">Return Books</a>
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
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                        <th>S.N</th> <th>Book_Name</th> <th>Publication</th><th>Faculty</th><th>Semester/Year</th><th>Available</th><th>NO_of_Books_Left</th><th>NO_of_Books_Taken</th><th>Date_of_Entry</th>
                           <th>Actions</th>  
                                       
                </tr>
                

            </thead>
            
            <tbody>
                @if(isset($data))
                    @foreach($data as $key => $item) 
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->book_name}}</td>
                            <td>{{$item->publication}}</td>
                            <td>{{$item->faculty}}</td>
                            <td>{{$item->semester}}</td>
                            <td>{{$item->total}}</td>
                            <td><?php $left = $item->total - $item->taken; if ($left == 0) {echo " no book available";}else{
                                echo $left;
                            } ?></td>
                            <td>{{$item->taken}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="/edit_books/{{$item->id}}">E</a>
                                <a href="/delete_books/{{$item->id}}">D</a>
                                

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop