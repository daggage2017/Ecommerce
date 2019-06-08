
@extends('layout.main')

@section('style')
    <style type="text/css">
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid #cccccc;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        .btn-default:disabled {
            cursor: not-allowed;
        }
    </style>
 @endsection

@section('content')


<!-- start checkout -->
<div class="checkout">
    <div class="container">
        @include('partial.alert')
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="information">
                    <h2>Billings Details</h2>
                    <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                        {{ csrf_field() }}

                        <div class="form-group ">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group ">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group ">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{ old('address') }}">
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="city" value="{{ old('city') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="province">Province:</label>
                                <input type="text" class="form-control" name="province" id="province"  placeholder="province" value="{{ old('province') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="postal-code">Postal Code:</label>
                                <input type="text" class="form-control" name="postal-code" id="postal-code" placeholder="postal code" value="{{ old('postal-code') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" name="phone"  id="phone" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                          <h2>Payment Details</h2>
                        <div class="form-group ">
                            <label for="address">Name in Cart:</label>
                            <input type="text" class="form-control" name="name-cart" id="name-cart" placeholder="Name in Cart" value="{{ old('name-cart') }}">
                        </div>

                        <div class="form-group ">
                        <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <div class="form-group ">
                           <button id="complate-order" class="btn btn-default">Complate Order</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="cart-info">
                    @if(Cart::count() > 0)
                    <h2>Your Order</h2>
                    <table class="table">
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td style="width: 150px"> <img class="img-responsive" src="{{ asset('images/1.png') }}" alt=""></td>
                            <td> <h3>{{ $item->model->name }}</h3>
                                <span>{{ $item->model->details }}</span> <br>
                                <span>  {{ $item->model->price }} $</span>
                            </td>
                            <td>
                                {{ $item->qty }}
                            </td>

                            <td></td>
                        </tr>
                        @endforeach
                   </table>
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
                    @else
                       <div class="alert alert-info"> No Item To Cart</div>
                     @endif

                </div>

            </div>
        </div>
    </div>
</div>

<!-- end items -->

@endsection


@section('script')

    <script type="text/javascript">
        (function () {


            // Create a Stripe client.
            var stripe = Stripe('pk_test_YMSFdmIFlboyhKlAlY8ci2Qv00BCOcrJyt');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                var options = {
                    name: document.getElementById('name-cart').value,
                    address: document.getElementById('address').value,
                    city: document.getElementById('city').value,
                    address_status: document.getElementById('province').value,
                    address_zip: document.getElementById('postal-code').value,

                }

                document.getElementById('complate-order').disabled = true;

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        document.getElementById('complate-order').disabled = true;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        }) ();
    </script>

@endsection