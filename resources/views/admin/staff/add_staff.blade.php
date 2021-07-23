@extends('admin/layout')

@section('content')
<style>
.form-group{
    width:100%;
    margin:4px;
}
input{
   
}

</style>
<div class="container">
<div>
    <h3>Add Staffs</h3>
</div> <hr>
<div class="row">
    <div class="col-sm-8 mx-auto"> 
        <form action="<?php if(isset($data)){ echo "/update_staff"; }else echo "/add_staff"; ?>" method="post"  enctype="multipart/form-data">
          @csrf
            <div class="d-flex">
            <div class="form-group mt-5">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="" class="w-100" required value="<?php if(isset($data)) echo $data->name; ?>">
            </div>
            <div class="form-group mt-5">
                <label for="name">Address</label><br>
                <input type="text" name="address" id="" class="w-100" required value="<?php if(isset($data)) echo $data->address; ?>">
            </div>
            <div class="form-group mt-5">
                <label for="name">Contact</label><br>
                <input type="text" name="contact" id="" class="w-100" required value="<?php if(isset($data)) echo $data->contact; ?>">
            </div>
            <div class="form-group"  style="">
            <img id="output" width="100%" height="100"  src="<?php if(isset($data)){ echo asset("image/staff/".$data->images); } else  echo asset('image/no-img.jpg'); ?>"/>
            <input type="file"  accept="image/*" name="img" id="file"  onchange="loadFile(event)" style="display: none;">
            <label for="file" style="cursor: pointer;" class="bg-primary m-0 w-100">Upload Image</label>
                
           </div>
            </div>
            <div class="d-flex">
            <div class="form-group">
                <label for="name">Work</label><br>
                <input type="text" name="work" id="" class="w-100" value="<?php if(isset($data)) echo $data->work; ?>">
            </div>
            <div class="form-group">
                <label for="name">Blood Group</label><br>
                <input type="text" name="bloodgroup" id="" class="w-100" value="<?php if(isset($data)) echo $data->bloodgroup; ?>">
            </div>

            </div>
            <div class="d-flex">
            <div class="form-group">
                <label for="name">Date Of Birth</label><br>
                <input type="text" name="dob" id="" class="w-100" placeholder="dd-mm-yyyy" value="<?php if(isset($data)) echo $data->dob; ?>">
            </div>
            <div class="form-group">
                <label for="name">Experience</label><br>
                <input type="text" name="experience" id="" class="w-100" value="<?php if(isset($data)) echo $data->experience; ?>">
            </div>
            <div class="form-group">
                <label for="name">Salary (Rs.)</label><br>
                <input type="number" name="salary" id="" class="w-100" value="<?php if(isset($data)) echo $data->salary; ?>">
            </div>
            <div class="form-group">
                <label for="name">Join Date</label><br>
                <input type="date" name="join" id="" class="w-100" value="<?php if(isset($data)) echo $data->join_date; ?>">
            </div>
            </div>

            @if(isset($data))
                    <input type="hidden" name="id" value="{{$data->id}}">
            @endif
            <button type="submit" class="float-right px-5">Save</button>
        </form>
    
    </div>
</div>

</div>
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
@stop