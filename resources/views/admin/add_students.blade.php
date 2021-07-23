@extends('admin/layout')

@section('content')
<style>
    body{
        background: linear-gradient(45deg, #0d3b0fa3, transparent);
        color: white;
    }
</style>
<section class="container-fluid">

    <h5 class="heading">personal profile</h5>
    <div class="pt-5" >
        <form action="<?php if(isset($data)){ echo "/update_student"; }else echo "/add_students"; ?>" method="post"  enctype="multipart/form-data">
        @csrf
            <div class="d-flex">
            <div class="form-group">
              <label for="id">Student ID  <samp style="color:red;">*</samp> :</label> <input type="number" name="std_id" id="" required value="<?php if(isset($data)){ echo $data->student_roll; }?>">
         </div>  
         <div class="form-group">
             <label for="id">Student Name <samp style="color:red;">*</samp> :</label> <input type="text" name="name" id="" required value="<?php if(isset($data)){ echo $data->student_name; }?>">
         </div>
         <div class="form-group"> 
           <label for="id">Date Of Admission :</label> <input type="text" name="doa" id="todaydate" placeholder="dd/mm/yyyy" value="<?php if(isset($data)){ echo $data->DOA; }?>">
         </div>
         <div class="form-group">
             <label for="id">Date Of Birth <samp style="color:red;">*</samp> :</label> <input type="text" name="dob" id="" placeholder="dd/mm/yyyy" required value="<?php if(isset($data)){ echo $data->DOB; }?>">
         </div>
        
         <div class="form-group "  style="margin-top:-60px;">
            <img id="output" width="100" height="100"  src="<?php if(isset($data)){ echo asset("image/student/".$data->image); } else  echo asset('image/no-img.jpg'); ?>"/>
            <input type="file"  accept="image/*" name="student_img" id="file"  onchange="loadFile(event)" style="display: none;">
            <label for="file" style="cursor: pointer;" class="bg-primary m-0">Upload Image</label>
                
           </div>
            
           
            </div>
            <div class="d-flex student">
            <div  class="form-group">
            <label for="id">Course <samp style="color:red;">*</samp> :</label>
                <select name="course" id="" required>
                <?php if(isset($data)){
                  echo  '<option value='.$data->course_name.'>'.$data->course_name.'</option>';
                }else{
                    echo '<option>select faculty</option>';
                }
                    ?>
                     @foreach($faculty as $fac)
                        <option value="{{$fac->faculty}}">{{$fac->faculty}}</option>
                    @endforeach
                </select>
         </div>
            <div class="form-group">
                    <label for="id">Gender :</label>
                <select name="gender" id="">
                <?php if(isset($data)){
                  echo  '<option value='.$data->gender.'>'.$data->gender.'</option>';
                }else{
                    echo '<option>select gender</option>';
                }
                    ?>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="Session">Session <samp style="color:red;">*</samp> :</label><br>
                    <input type="text" name="session" id="session" placeholder="2012-2015" required value="<?php if(isset($data)){ echo $data->session; }?>">
                </div>
                <div class="form-group">
                    <label for="semester">Semester <samp style="color:red;">*</samp> :</label><br>
                    <select name="semester" id="" required>
                    <?php if(isset($data)){
                  echo  '<option>'.$data->semester.'</option>';
                }else{
                    echo '<option>select sem</option>';
                }
                    ?>
                        @foreach($semester as $sem)
                        <option value="{{$sem->semester_name}}">{{$sem->semester_name}}</option>
                    @endforeach
                       
                    </select>
                </div>
                

            </div>
            <div class="d-flex student">
            <div class="form-group">
                    <label for="contact">Contact <samp style="color:red;">*</samp> :</label><br>
                    <input type="text" name="contact" placeholder="" required value="<?php if(isset($data)){ echo $data->contact; }?>">
                </div>
            <div class="form-group">
                    <label for="nationality">Nationality :</label><br>
                    <input type="text" name="nationality" placeholder="" value="<?php if(isset($data)){ echo $data->nationality; }?>">
                </div>
                <div class="form-group">
                    <label for="father">Father Name <samp style="color:red;">*</samp> :</label> <input type="text" name="father" id="" required value="<?php if(isset($data)){ echo $data->father_name; }?>">
                </div>
                <div class="form-group">
                    <label for="mother">Mother Name :</label> <input type="text" name="mother" id="" value="<?php if(isset($data)){ echo $data->mother_name; }?>">
                </div>
                
            </div>
            <div class="d-flex student">
            <div class="form-group">
                    <label for="address">Permanent Address :</label> <input type="text" name="per_address" id="" value="<?php if(isset($data)){ echo $data->per_address; }?>">
                </div>
            <div class="form-group">
                    <label for="address">Temparary Address <samp style="color:red;">*</samp> :</label> <input type="text" name="temp_address" id="" required value="<?php if(isset($data)){ echo $data->temp_address; }?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address <samp style="color:red;">*</samp> :</label> <input type="email" name="email" id="" required value="<?php if(isset($data)){ echo $data->email; }?>">
                </div>
                
            </div>
                <h5>Guardian Information</h5>
            <div class="d-flex student">
                <div class="form-group">
                    <label for="father">Guardian Name <samp style="color:red;">*</samp> :</label> <input type="text" name="guardian" id="" required value="<?php if(isset($data)){ echo $data->guardian_name; }?>"> 
                </div>
                <div class="form-group">
                    <label for="contact">Contact  Number <samp style="color:red;">*</samp> :</label> <input type="text" name="guardian_contact" id="" required value="<?php if(isset($data)){ echo $data->guardian_contact; }?>">
                </div>
            </div>
            <h5>Academic Information</h5>
            <?php 
                  if (isset($data)) {
                    $a = $data->academic_information;
                    $exp = explode("/", $a);
                    $c = count($exp);
                   
                  }
                
                ?>
            <div class="d-flex student">
                <div class="form-grou">
                    <label for="#">School / College Name</label> <br>
                    <input type="text" name="course1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[0]; } else echo "Higher School";?>">
                    <input type="text" name="course2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[0]; } else echo "Higher Secondary";?>">
                    <input type="text" name="course3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[0]; } else echo "Other";?>">
                </div>
             
                <div class="form-grou">
                    <label for="#">Passed Year</label><br>
                    <input type="text" name="passed1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[1]; } ?>">
                    <input type="text" name="passed2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[1];}?>">
                    <input type="text" name="passed3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[1]; }?>">
                </div>
                <div class="form-grou">
                    <label for="#">Percentage / GPA</label><br>
                    <input type="text" name="percentage1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[2]; }?>">
                    <input type="text" name="percentage2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[2]; }?>">
                    <input type="text" name="percentage3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[2]; }?>">
                </div>
                <div class="form-grou">
                    <label for="#">Board / University</label><br>
                    <input type="text" name="board1" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[0]);  echo $e[3]; } else echo "SEE";?>">
                    <input type="text" name="board2" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[1]);  echo $e[3]; } else echo "NEB"; ?>">
                    <input type="text" name="board3" id="" value="<?php if(isset($data)){ $e= explode("-",$exp[2]);  echo $e[3]; }else echo "other";?>">
                </div>
                @if(isset($data))
                    <input type="hidden" name="id" value="{{$data->id}}">
                @endif
               
            </div>
           <input type="submit" value="Save Details" class="mt-3 px-5">
        </form>
    </div>
</section>
@stop