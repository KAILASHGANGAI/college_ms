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
        <form action="/payment_record" method="post">
        @csrf
        <div class="line pb-3">
               <span >
                  <h2><span>Payment form</span></h2>
                </span>
         </div>

            <div class="row student ">
            
             <div class="form col-sm-8 mx-auto ">
                      <span>Date : <?php echo date("Y/m/d");?></span><hr>

             <div class="row ">

                <div class="form-group col-sm-4 ">
                    <label for="">Student Roll no.</label> <br>
                    <input type="number" name="student_roll" id="" required>
                </div>
                <div class="form-group  col-sm-4">
                <label for="">Select Semester</label> <br>
                   <select name="semester" id="" onchange="fetch_select(this.value);">
                   <option >Select Semester</option>
                    @foreach($semesters as $sem)
                        <option value="{{$sem->id}}">{{$sem->semester_name}}</option>
                    @endforeach
                   </select>
                   
                </div>
                <div class="form-group col-sm-4 "> 
                    <label for="">Total installment.</label> <br>
                    <input type="text" name="total_ins" id="total">
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Deposite Amount</label> <br>
                    <input type="number" name="amount" id="" required>
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Discount Amount</label> <br>
                    <input type="number" name="discount" id="">
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Payment Method</label> <br>
                    <select name="payment_method" id="" required>
                        <option > payment method</option>
                        <option value="cash">Cash</option>
                        <option value="Cheque">cheque</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="">Received By</label> <br>
                    <input type="text" name="received_by" id="" required>
                </div>
                <div class='container fee text-center'>
                    <label for="months">---------- Fee Type---------</label><br>
                    <input class="ckech-box" type="checkbox" value="Admission-Fee" name="fee[]" id=""> Admission Fee <br>
                    <input class="ckech-box" type="checkbox" value="Installment" name="fee[]" id=""> Installment <br>
                    <input class="ckech-box" type="checkbox" value="Other" name="fee[]" id=""> Other
                    
                </div>
                    <div class="float-right py-3">
                          <button class="px-3">Print & save</button>

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

