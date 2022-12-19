@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 ">
            <div class="col-lg-6 p-5" style="border: 2px solid blue;box-shadow: 3px  3px 5px 2px brown;background: #e2e8f0;">
                <div class="form-check">
                    <form action="{{route('pet.index')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label  for="inputPassword6" class="col-form-label">Name</label>
                            </div>
                            <div class="col-auto">
                                <input name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="col-auto">
                                <label  for="inputPassword6" class="col-form-label">Price</label>
                            </div>
                            <div class="col-auto">
                                <input name="price" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ old('name') }}">
                            </div>

                            <div class="col-auto">
                                <label  for="inputPassword6" class="col-form-label">Sale_price</label>
                            </div>
                            <div class="col-auto">
                                <input name="sale_price" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value="{{ old('name') }}">
                            </div>
                            <div class="col-auto">
                                <label  for="inputPassword6" class="col-form-label">Image</label>
                            </div>
                            <div class="col-auto">
                                <input name="file" type="file" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-auto">
                                <label  for="inputPassword6" class="col-form-label">Description</label>
                            </div>
                            <textarea name="description" id="" cols="20" rows="4"></textarea>

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
            </div>
        </div>
    </div>
@endsection
