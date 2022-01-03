@extends('admin/layout')
@section('container')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Village Management</h1>
    </div>

    <a href="{{ url('admin/village') }}">
        <span class="btn btn-primary">
            << Back</span>
    </a>
    <hr>
    <form action="{{ route('addvillage.addv') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Village Name</label>
                <input type="text" class="form-control" id="inputEmail4" value="{{ $village }}" name="villagename"
                    placeholder="Village Name" required>
            </div>
            <hr>
        </div>
        <hr>
        <?php
        
        if (Request::is('admin/village/add_village/*')) {
            echo '<button type="submit" class="btn btn-primary" name="addevent">Confirm Edit </button>';
        } else {
            echo '
                      <button type="submit" class="btn btn-primary" name="addevent">Confirm</button>
                    
                      ';
        }
        
        ?>
        <input type="hidden" name="id" value="{{ $id }}" />

    </form>

@endsection
