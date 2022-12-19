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
            <th>Status</th>
            <th>Filter</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->status == 1 ? "Active" : "Not Active"}}</td>
                <td>
                    <a href="{{route('category.update',['id'=>$category->id])}}" class="btn btn-success">Update</a>
                    <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <a href="{{route('category.add')}}" class="btn btn-success">Add Category to your list</a>

@endsection
