@extends("admin.master")

@section('content')

    @if (session('error') ? session('error') : session('success'))
        <div class="alert {{session('error') ? "alert-danger" : "alert-success"}}">
            {{session('error') ? session('error') : session('success') }}
        </div>


    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Order</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Sale Price</th>
            <th>Description</th>
            <th>Status</th>
            <th>Category</th>
            <th>Filter</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td><img width="40" src="{{url('uploads')}}/{{$product->image}}" alt=""></td>
                <td>{{$product->price}}</td>
                <td>{{$product->sale_price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->relationCate->name}}</td>
                <td>{{$product->status == 1 ? "Active" : "Not Active"}}</td>
                <td>
                    <a href="{{route('product.update',['id'=>$product->id])}}" class="btn btn-success">Update</a>
                    <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <a href="{{route('product.add')}}" class="btn btn-success">Add Product to your list</a>

@endsection
