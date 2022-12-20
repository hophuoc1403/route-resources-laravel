@extends('master')
@section('content')

            <div class="jumbotron">
                <h1 class="display-3">Hello Guest</h1>
                <p class="lead">Jumbo helper text</p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                </p>
            </div>

        <h1 class="text-center my-4"> Newest Product</h1>
            <div class="container">
                <div class="row">
                    @foreach($newestProducts as $newestProduct)
                        <div  class="col-lg-3">
                            <div class="card text-center">
                                <img class="card-img-top" src="{{url('uploads')}}/{{$newestProduct->image}}" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">{{$newestProduct->name}}</h4>
                                    @if($newestProduct->sale_price)
                                        <span class="text-success">${{$newestProduct->price}}</span>
                                        <small style="text-decoration: line-through" class="card-text">{{$newestProduct->price}}</small>
                                    @else
                                        <p class="card-text">${{$newestProduct->price}}</p>
                                    @endif
                                </div>
                                    <a class="btn  btn-success" href={{route("product.show",$newestProduct->id)}}"">See Detail</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <h1 class="text-center my-4">{{$saleProducts !== [] ? "Best Sale Product" : ""}}</h1>
            <div class="container">
                <div class="row">
                    @foreach($saleProducts as $newestProduct)
                        <div  class="col-lg-3">
                            <div class="card text-center">
                                <img class="card-img-top" src="{{url('uploads')}}/{{$newestProduct->image}}" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">{{$newestProduct->name}}</h4>
                                    @if($newestProduct->sale_price)
                                        <span class="text-success">${{$newestProduct->price}}</span>
                                        <small style="text-decoration: line-through" class="card-text">{{$newestProduct->price}}</small>
                                    @else
                                        <p class="card-text">${{$newestProduct->price}}</p>
                                    @endif
                                </div>
                                    <a class="btn  btn-success" href={{route("product.show",$newestProduct->id)}}"">See Detail</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

@endsection
