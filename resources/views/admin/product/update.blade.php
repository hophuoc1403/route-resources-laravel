@extends('admin.master')

@section('content')
    <div class="form-check">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label">Name</label>
                </div>
                <div class="col-auto">
                    <input name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ $product->name }}">
                </div>
                @if($errors->get("name"))
                    <p class="text-danger">{{$errors->first("name")}}</p>
                @endif

                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label">Price</label>
                </div>
                <div class="col-auto">
                    <input name="price" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ $product->price }}">
                </div>
                @if($errors->get("price"))
                    <p class="text-danger">{{$errors->first("price")}}</p>
                @endif
                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label">Sale_price</label>
                </div>
                <div class="col-auto">
                    <input name="sale_price" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ $product->sale_price  }}">
                </div>
                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label">Image</label>
                </div>
                <div class="col-auto">
                    <input name="file" type="file" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>

                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label" >Description</label>
                </div>
                <input name="description" id="" value="{{$product->description}}">

                @if($errors->get("description"))
                    <p class="text-danger">{{$errors->first("description")}}</p>
                @endif

                <div class="form-group">
                    <label for="">Select Category</label>
                    <select class="custom-select" name="category_id" id="">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

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
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>

    </div>
@endsection
