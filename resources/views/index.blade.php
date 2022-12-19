@extends('master')
@section('content')
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="jumbotron">
        <h1 class="display-3">Jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
    <h1>Newest Product</h1>
    <div class="container">
        <div class="row">
            @foreach ($newestProducts as $item)
                <div class="card col-lg-3">
                    <img style="width: 100px" class="card-img-top" src="{{ url('uploads') }}/{{ $item->image }}"
                        alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>
                        <p class="card-text">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
