
@extends('layout.main')

@section('style')
    <style type="text/css">
        .content {
            margin-top: 100px;

        }
    </style>
  @endsection
@section('content')




<!-- start checkout -->
<div class="thank">
    <div class="container ">
        @include('partial.alert')

        <div class="content text-center">
            <h2>Thank you <br> for order </h2>
            <a class="btn btn-info " href="/">Home Page</a>
        </div>

        <div >

        </div>

    </div>
</div>

<!-- end items -->

@endsection