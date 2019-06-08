@extends('layout.main')


@section('style')

    <style>
        .sidebar li a {
            font-size: 20px;
            color: #222222;
            text-decoration: none;
        }
    </style>
 @endsection()


@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>
</div>

<!-- start shops -->
<div class="shops">
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                 <div class="sidebar">

                     <div class="side">
                        <div class="side-header">
                            <h3>By Categories</h3>
                        </div>
                         <ul class="list-unstyled">
                             @foreach($categories as $category)
                             <li><a href="{{ route('shops.shop', ['category'  => $category->slug ]) }}">{{ $category->name }}</a></li>
                             @endforeach
                         </ul>
                     </div>

                 </div>
            </div>

            <div class="col-sm-9">
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                      <h2 class="text-left col-xs-6">{{ $categoryName }}</h2>
                     <div class="col-xs-6">
                         <b>Price : </b>
                         <a href="{{ route('shops.shop',  ['category'  =>  request()->category, 'sort' => 'high-to-low']) }}">High to low</a> |
                         <a href="{{ route('shops.shop',  ['category'  =>  request()->category, 'sort' => 'low-to-high']) }}">low to high</a>
                     </div>

                  </div>
                    @forelse($products as $product)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="shop text-center">
                            <a href="{{ route('shops.show', $product->slug) }}"><img class="img-responsive" src="{{asset('images/1.png')}}" alt=""> </a>
                            <a href="{{ route('shops.show', $product->slug) }}"><h4>{{ $product->name }}</h4> </a>
                            <h4> {{ $product->price }}</h4>
                        </div>
                    </div>

                        @empty
                        <div style="text-align: left">no item in this category</div>

                        @endforelse

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end shops -->
@endsection