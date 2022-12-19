@extends('admin.master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-lg-6">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)

                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$pet->name}}</td>
                    <td>{{$pet->price}}</td>
                    <td>{{$pet->sale_price}}</td>
                    <td><img width="20" src="{{url('uploads')}}/{{$pet->image}}" alt=""></td>
                    <td>{{$pet->description}}</td>
                    <td>{{$pet->relationship->name}}</td>
                    <td class="d-flex"><a href="{{route('pet.edit',$pet->id)}}" class="btn btn-success">Update</a>
                        <a href="{{route('pet.destroy',$pet->id)}}" class="btn btn-danger">Delete</a>
</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<a href="{{route('pet.create')}}">Add pet</a>
@endsection
