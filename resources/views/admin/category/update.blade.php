@extends("admin.master");

@section('content')

    <div class="form-check">
        <form action="" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6"  class="col-form-label">name</label>
                </div>
                <div class="col-auto">
                    <input name="name" value="{{$category->name}}" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                @if($errors->get("name"))
                    <p class="text-danger">{{$errors->first("name")}}</p>
                @endif
                <div class="col-auto">
                    <label  for="inputPassword6" class="col-form-label">address</label>
                </div>
                <div class="d-flex justify-between form-outline mb-4">
                    <div>
                        <input name="status" value="1" {{$category->status  ? "checked" : "" }} type="radio" checked>
                        <span>Active</span>
                    </div>
                    <div>
                        <input name="status" value="0"  {{!$category->status  ? "checked" : "" }} type="radio">
                        <span>Activen't</span>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
