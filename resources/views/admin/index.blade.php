@extends('admin.master')

@section('content')

    <div class="jumbotron text-center">
        <h1>Welcome admin {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
        <h1 class="display-3">This is Dashboard page</h1>
        <p class="lead">Choose where you want to go ???</p>

        <hr class="my-2">
        <a href="{{route("admin.category")}}" class="btn btn-success">Categories</a>
        <a href="{{route("admin.product")}}" class="btn btn-primary">Products</a>
        <a href="{{route("pet.index")}}" class="btn btn-primary">Pets</a>

    </div>

@endsection
