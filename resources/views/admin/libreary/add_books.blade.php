@extends('admin/layout')
@section('content')
<style>
.form{
    box-shadow: 2px 3px 9px 5px #ccc;
    padding:35px;
}
span{
    color:#041304;
}
</style>
<section  class="container-fluid">
 
    <div class="">
        <form action="<?php if(isset($data)){ echo "/update_books"; }else echo "/add_book_to"; ?>" method="post">
        @csrf
        <div class="line pb-3">
               <span >
                  <h2><span>Add Books</span></h2>
                </span>
         </div>

            <div class="row student ">
            
             <div class="form col-sm-8 mx-auto ">
                      <span>Date : <?php echo date("Y/m/d");?></span><hr>
             <div class="row ">

                <div class="form-group col-sm-4 ">
                    <label for="">Book Name.</label> <br>
                    <input type="text" name="name" id="" required value="<?php if(isset($data)){ echo $data->book_name; }?>">
                </div>
                <div class="form-group col-sm-4 ">
                    <label for="">Book Publication.</label> <br>
                    <input type="text" name="publication" id="" required value="<?php if(isset($data)){ echo $data->publication; }?>">
                </div>
                <div class="form-group  col-sm-4">
                <label for="">Select Faculty</label> <br>
                   <select name="faculty" id="">
                   <option value="<?php if(isset($data)){ echo $data->faculty; }?>"><?php if(isset($data)){ echo $data->faculty;} else {echo "Select Faculty"; }?></option>
                    @foreach($faculty as $fac)
                        <option value="{{$fac->faculty}}">{{$fac->faculty}}</option>
                    @endforeach
                    <option value="others">others</option>

                   </select>
                   
                </div>
                <div class="form-group  col-sm-4">
                <label for="">Select Semester</label> <br>
                   <select name="semester" id="">
                   <option value="<?php if(isset($data)){ echo $data->semester; }?>"><?php if(isset($data)){ echo $data->semester;} else {echo "Semester/Years"; }?></option>
                    @foreach($semesters as $sem)
                        <option value="{{$sem->semester_name}}">{{$sem->semester_name}}</option>
                    @endforeach
                    <option value="others">others</option>
                   </select>
                   
                </div>
                <div class="form-group col-sm-4 "> 
                    <label for="">Total No of Books.</label> <br>
                    <input type="number" name="total" id="total" value="<?php if(isset($data)){ echo $data->total; }?>"> 
                </div>
                @if(isset($data))
                <input type="hidden" name="id" value="{{$data->id}}">
                @endif
                    <div class="float-right py-3">
                          <button class="px-3">save</button>

                    </div>
             </div>
             </div>
            
                    
            
            </div>
            
        </form>
    </div>
</section>
<script src="{{asset("/js/jquery.min.js")}}"></script>
<script>
function fetch_select(val)
{
    var _token = $("input[name='_token']").val();
 $.ajax({

 type: 'post',
 url: "{{route('ajaxrequest.post')}}",
 data: {
     _token :_token,
  get_option:val
 },
 success: function (response) {
  //  window.alert(response.success);
  document.getElementById("total").value=response.success; 
 }
 });
}


</script>

@stop

