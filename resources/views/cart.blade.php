
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

<!-- start carts -->
<div class="carts">
    <div class="container">
        @include('partial.alert')
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="cart-info">
                    @if(Cart::count() > 0)
                    <h2>{{ Cart::count() }} item(s) in shopping Cart</h2>
                    <table class="table">
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td style="width: 150px"> <img class="img-responsive" src="{{ asset('images/1.png') }}" alt=""></td>
                            <td> <h3>{{ $item->model->name }}</h3>
                                <span>{{ $item->model->details }}</span>
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="cart-options">Remove</button>
                                </form>

                                <form action="{{ route('save.later', $item->rowId) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="cart-options">Save to Later</button>
                                </form>

                            </td>
                            <td>
                                <select name="" class="quantity">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                </select>
                            </td>

                            <td>{{ $item->model->price }} $</td>
                        </tr>
                        @endforeach
                   </table>
                    @else
                       <div class="alert alert-info"> No Item To Cart</div>
                     @endif
                </div>

                <div class="code">
                    <h3>Have a code ?</h3>
                    <form action="">
                        {{ csrf_field() }}
                        <input type="text">
                        <button>Apply</button>
                    </form>
                </div>
                <hr>

                <div class="total">
                    <div class="row">
                        <div class="col-sm-7">
                            <p>Lorem ipsum dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci</p>
                        </div>
                        <div class="col-sm-5">
                             <table class="table">
                                 <tr>
                                     <td>Subtotal</td>
                                     <td>{{ Cart::subtotal() }} $</td>
                                 </tr>
                                 <tr>
                                     <td>Tax</td>
                                     <td>{{ Cart::tax() }} $</td>
                                 </tr>
                                 <tr>
                                     <td>Total</td>
                                     <td>{{ Cart::total() }} $</td>
                                 </tr>
                             </table>
                        </div>
                    </div>
                </div>

               <div class="cart-button">
                   <a href="{{ route('shops.shop') }}" class="btn btn-default">Continue shopping</a>
                   <a href="{{route('checkout.index')}}" class="btn btn-info pull-right">Checkout Cart</a>
               </div>
                <br>

                <div class="save-later">
                    <div class="cart-info">
                        @if(Cart::instance('saveToLater')->count() > 0)
                            <h2>{{ Cart::instance('saveToLater')->count() }} item(s) Saved to later</h2>
                            <table class="table">

                                @foreach( Cart::instance('saveToLater')->content() as $item)
                                <tr>
                                    <td style="width: 150px"> <img class="img-responsive" src="{{ asset('images/1.png') }}" alt=""></td>
                                    <td>
                                        <h3>{{ $item->name }}</h3>
                                        <span> {{ $item->details }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('switch.destroy', $item->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="cart-options">Remove</button>
                                        </form>

                                        <form action="{{ route('switch.later', $item->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="cart-options">Move to cart</button>
                                        </form>
                                    </td>
                                    <td>
                                        <select name="" id="">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                        </select>
                                    </td>

                                    <td>{{ $item->price }}$</td>
                                </tr>

                             @endforeach

                            </table>
                            @else
                            <div class="alert alert-info"> No Item Saved to later</div>
                   @endif
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end items -->

@include('shops.might')


@endsection


@section('script')

    <script type="text/javascript">
        (function () {
            var className = document.querySelectorAll('.quantity');
              Array.from(className).forEach(function (element) {
                  element.addEventListener('change', function () {
                     $.post("{{ route('cart.update', 4) }}", function (data) {
                          console.log(data)
                      })
                  })
              })
         } ());
    </script>

@endsection