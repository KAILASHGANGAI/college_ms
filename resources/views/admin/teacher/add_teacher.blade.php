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
    <h3>Add Teachers</h3>
</div> <hr>
<div class="row">
    <div class="col-sm-8 mx-auto"> 
        <form action="<?php if(isset($data)){ echo "/update_teacher"; }else echo "/add_teacher"; ?>" method="post"  enctype="multipart/form-data">
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
            <img id="output" width="100%" height="100"  src="<?php if(isset($data)){ echo asset("image/teacher/".$data->images); } else  echo asset('image/no-img.jpg'); ?>"/>
            <input type="file"  accept="image/*" name="img" id="file"  onchange="loadFile(event)" style="display: none;">
            <label for="file" style="cursor: pointer;" class="bg-primary m-0 w-100">Upload Image</label>
                
           </div>
            </div>
            <div class="d-flex">
            <div class="form-group">
                <label for="name">Email</label><br>
                <input type="text" name="email" id="" class="w-100" required value="<?php if(isset($data)) echo $data->email; ?>">
            </div>
            <div class="form-group">
                <label for="name">Subject</label><br>
                <input type="text" name="subject" id="" class="w-100" value="<?php if(isset($data)) echo $data->subject; ?>">
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
            <div class="p-3">
            <h4>Academic Information</h4>
            <?php 
                  if (isset($data)) {
                    $a = $data->education;
                    $exp = explode("/", $a);
                    $c = count($exp);
                   
                  }
                
                ?>
            <div class="d-flex student">
                <div class="form-grou">
                    <label for="#">School / College Name</label> <br>
                    <input type="text" name="course1" id=""value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[0]; } else echo "Higher School";?>">
                    <input type="text" name="course2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[0]; } else echo "Higher Secondary";?>">
                    <input type="text" name="course3" id=""value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[0]; } else echo "bachlor college";?>">
                    <input type="text" name="course4" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[3]);  echo $e[0]; } else echo "Other";?>">
                </div>
             
                <div class="form-grou">
                    <label for="#">Passed Year</label><br>
                    <input type="text" name="passed1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[1]; }?>">
                    <input type="text" name="passed2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[1]; }?>">
                    <input type="text" name="passed3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[1]; }?>">
                    <input type="text" name="passed4" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[3]);  echo $e[1]; }?>">
                </div>
                <div class="form-grou">
                    <label for="#">Percentage / GPA</label><br>
                    <input type="text" name="percentage1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[2]; }?>">
                    <input type="text" name="percentage2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[2]; }?>">
                    <input type="text" name="percentage3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[2]; }?>">
                    <input type="text" name="percentage4" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[3]);  echo $e[2]; }?>">
                </div>
                <div class="form-grou">
                    <label for="#">Board / University</label><br>
                    <input type="text" name="board1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[3]; } else echo "SEE";?>">
                    <input type="text" name="board2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[3]; } else echo "NEB";?>">
                    <input type="text" name="board3" id=""value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[3]; } else echo "university";?>">
                    <input type="text" name="board4" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[3]; } else echo "other";?>">
                </div>
                               
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