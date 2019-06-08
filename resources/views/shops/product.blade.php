
@extends('layout.main')


@section('content')


<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shops.shop') }}">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">product</li>
        </ol>
    </nav>
</div>

<!-- start items -->
<div class="items">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="item-img">
                    <img class="img-responsive" src="{{ asset('images/1.png') }}" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-7">
                <div class="item-info">
                   <h3>{{ $product->name }}</h3>
                    <span>{{ $product->details }}</span>
                    <h3>{{ $product->price }}</h3>
                    <p class="lead"> {{ $product->description }}</p>

                    <form action="{{ route('cart.store', $product->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-default">Add to cart</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- end items -->
@include('shops.might')
@endsection