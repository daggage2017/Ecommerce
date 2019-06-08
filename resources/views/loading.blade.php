@extends('layout.main')


@section('content')

<div class="header">
    <div class="home">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <div class="home-text">
                         <h2>Eccomerce Soug</h2>
                        <p class="lead"> Lorem ipsum dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci</p>
                        <button class="btn btn-default">Blog</button>
                        <button class="btn btn-default">Githup</button>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="home-img">
                        <img class="img-responsive" src="{{ asset('images/home-img.png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- start about us -->
<div class="aboutus text-center">
    <div class="container">
        <h2>Eccomerce Soug</h2>
        <p class="lead"> Lorem ipsum dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci</p>
        <button class="btn btn-default">Feature</button>
        <button class="btn btn-default">On sale</button>
    </div>
</div>
<!-- end about us -->

<!-- start products -->
<div class="products">
    <div class="container">
        <div class="row">

             @foreach($products as $key => $product)
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="product text-center">
                    <a href="{{ route('shops.show', $product->slug) }}">  <img class="img-responsive" src="{{asset('images/1.png')}}" alt=""></a>
                        <a href="{{ route('shops.show', $product->slug) }}"><h4>{{ $product->name }}</h4></a>
                    <h4>{{ $product->price }}</h4>
                </div>
            </div>
            @endforeach

            <a href="/shop" class="btn btn-default text-center more">View More Products</a>
        </div>
    </div>
</div>
<!-- end products -->

@endsection