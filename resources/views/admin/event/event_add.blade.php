@extends('admin/layout')

@section('content')
<section class="container">
<form action="/event_add" method="post">
 @csrf
 
  Task name:
  <br />
  <input type="text" name="event_name" />
  <br /><br />
  Task description:
  <br />
  <textarea name="description"></textarea>
  <br /><br />
  Start time:
  <br />
  <input type="text" id="nepali-datepicker" name="date" value="" placeholder="Select Nepali Date"/> 
  <br /><br />
  <input type="submit" value="Save" />
</form>
</section>
<script>
 window.onload = function() {
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();
    };
    


</script>
@stop