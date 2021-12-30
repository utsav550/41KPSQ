@extends('admin/layout')
@section('container')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Event Management</h1>
</div>

<a href="{{url('admin/events')}}">
  <span class="btn btn-primary"> << Back</span>
</a>
<hr>
<form  action="{{route('event.add')}}" method="POST">
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Event Name</label>
        <input type="text" class="form-control" id="inputEmail4"  value="{{$name}}" name="eventname" placeholder="Event Name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Event Date</label>
        <input type="date" class="form-control" id="inputPassword4"  value="{{$date}}" name="date" placeholder="Date" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Place</label>
      <input type="text" class="form-control" id="inputAddress"  value="{{$place}}" name="place" placeholder="1234 Main St" required>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Price per person</label>
        <input type="text" class="form-control" id="inputCity"  value="{{$price}}" name="price" placeholder="$100" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">People Allowed</label>
        <input type="text" class="form-control" id="inputCity"  value="{{$people}}" name="people" placeholder="50" required>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Time</label>
        <input type="time" class="form-control" id="inputZip"  value="{{$time}}" name="time" placeholder="9:00 AM" required>
      </div>
      <div class="form-group col-md-12">
        <label for="inputAddress">Event description</label>
        <input type="textarea" class="form-control" id="inputAddress"  value="{{$desc}}" name="desc" placeholder="About Event..." required>
      </div>
      
      <div class="custom-file ">
        <input type="file" class="custom-file-input" id="validatedCustomFile" name="img">
        <label class="custom-file-label" for="validatedCustomFile">Choose image...</label>
    </div>
    
    <hr>
    

    </div>
    <hr>
    
    <?php


    if (Request::is('admin/events/add_event/*')){
      echo '<button type="submit" class="btn btn-primary" name="addevent">Confirm Edit </button>';
    }
    else{
      echo'
      <button type="submit" class="btn btn-primary" name="addevent">Confirm</button>
    
      ';
    }
   
?>
 <input type="hidden" name="id" value="{{$id}}"/>
 <input type="hidden" name="sold" value="{{$sold}}"/>
  </form>

@endsection