@extends('/admin/layout')

@section('content')

<section>

<div class="d-flex">   
<div class="container mt-3 w-75">
  <h2 >Student Profile</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#Profile">Personal Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#documents">Education</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#payment">Payments Records</a>
    </li>
      </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="Profile" class="container tab-pane active"><br>
        <div class="row">
            <div class="col-sm-6">
                <img src="{{asset('image/student/'.$data->image)}}" class="img-fluid" alt="">
               <div class="line">
               <span >
                  <h2><span>Guardien Details</span></h2>
                </span>
                <span>Guardian Name : {{$data->guardian_name}}</span> <br>
                <span>Guardian contact : {{$data->guardian_contact}}</span>
               </div>
             </div>
             <div class="col-sm-6">
                <span>Student Name : {{$data->student_name}}</span> <br>
                <span>Student Roll No. : {{$data->student_roll}}</span>  <br>  
                <span>Addmission Date : {{$data->DOA}}</span>   <br>
                <span>Date Of Birth: {{$data->DOB}}</span>   <br>
                <span>Phone no.: {{$data->contact}}</span>   <br>
                <span>Email.: {{$data->email}}</span>   <br>
                <span>Permanent Address: {{$data->per_address}}</span>   <br>
                <span>Temporary Address: {{$data->temp_address}}</span>   <br>
                <span>Course / Faculty : {{$data->course_name}}</span>   <br>
                <span>Gender : {{$data->gender}}</span>   <br>
                <span>Session : {{$data->session}}</span>   <br>
                <span>Semester : {{$data->semester}}</span>   <br>
                <span> Nationality : {{$data->nationality}}</span><br>   
                <span>Father Name : {{$data->father_name}}</span> <br>  
                <span>Mother Name : {{$data->mother_name}}</span>   
                   
             </div>
        </div>
    </div>
    <div id="documents" class="container tab-pane fade"> <br> 
      <h3>Academic Information</h3>
      <table class="table">
        <tr>
            <th>School / College Name</th>
            <th>Passed Year</th>
            <th>Percentage / G.P.A</th>
            <th>Board / University</th>

        </tr>
        <tbody>
        <?php 
                  if (isset($data)) {
                    $a = $data->academic_information;
                    $exp = explode("/", $a);
                    $c = count($exp);
                    foreach ($exp as $e) {
                    $single = explode("-",$e);

                      ?>
                          <tr>
                          @foreach($single as $val)
                          <td>{{$val}}</td>
                          @endforeach
                          
                          </tr>
                      <?php
                      

                    }
                  }
                
                ?>
        </tbody>
      </table>
    </div>
    <div id="payment" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>
<div class="container w-25 text-center pt-5 display-grid">
<a href="" class="btn btn-danger m-1 w-100">Delete</a> <br>
<a href="" class="btn btn-success m-1 w-100">Update</a> <br>
<a href="/payment" class="btn btn-info m-1 w-100">Payment</a>

</div>
</div>

</section>
@stop