@extends('admin.master')

@section('content')

    <form method="post" class="w-50">
        <!-- Name input -->
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example1">Name</label>
            <input type="text" id="form4Example1" name="name" class="form-control" value="{{old('name')}}" />
        </div>
        @if($errors->get("name"))
            <p class="text-danger">{{$errors->first("name")}}</p>
        @endif

        <!-- Message input -->
        <br>
        <div class="d-flex justify-between form-outline mb-4">
            <div>
                <input name="status" value="1" type="radio" checked>
                <span>Active</span>
            </div>
            <div>
                <input name="status" value="0" type="radio">
                <span>Activen't</span>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>

@endsection
