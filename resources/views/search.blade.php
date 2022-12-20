@extends('master')
@section('content')

    <h1 class="text-center">Search Result for '{{$query}}'</h1>

    <div class="container">
        <div class="row">
@forelse ($result as $item)
                <div  class="col-lg-3">
                    <div class="card text-center">
                        <img class="card-img-top" src="{{url('uploads')}}/{{$item->image}}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$item->name}}</h4>
                            @if($item->sale_price)
                                <span class="text-success">${{$item->price}}</span>
                                <small style="text-decoration: line-through" class="card-text">{{$item->price}}</small>
                            @else
                                <p class="card-text">${{$item->price}}</p>
                            @endif
                        </div>
                        <a class="btn  btn-success" href={{route("product.show",$item->id)}}"">See Detail</a>
                    </div>
                </div>
@empty
    <p>No Product to find</p>
@endforelse
        </div>
    </div>





{{ $result->links() }}
@endsection
