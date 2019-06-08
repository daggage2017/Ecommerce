<div class="might-item">
    <div class="container">
        <h2>Your Might also like</h2>

        <div class="row">

            @foreach($likes as $like)

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="product text-center">
                    <img class="img-responsive" src="{{asset('images/1.png')}}" alt="">
                    <h4>{{ $like->name }}</h4>
                    <h4>{{ $like->price }}</h4>
                </div>
            </div>

          @endforeach

        </div>

    </div>
</div>