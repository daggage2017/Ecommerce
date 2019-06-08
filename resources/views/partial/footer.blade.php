<div class="footer">
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="foot">
                    <h2>{{ trans('nav.services') }}</h2>
                    @foreach($services as $s)
                        @if(\Session::has('lang') && \Session::get('lang') == 'ar')
                            <p><a href="{{  route('service', $s->id) }}">{{ $s->title_ar }}</a></p>
                        @endif
                        @if(\Session::has('lang') && \Session::get('lang') == 'en')
                            <p><a href="{{  route('service', $s->id) }}">{{ $s->title_en }}</a></p>
                        @endif
                    @endforeach
                </div>
            </div>



            <div class="col-sm-4">
                <div class="foot">
                    <div class="logo-footer">
                        <img src="{{asset('images/'. $setting->image)}}" alt="" width="100%">
                    </div>
                    <div class="slinks-footer text-center">
                        <a target="_blank" href="{{ $setting->facebook }}"><span><i class="fab fa-facebook-square"></i></span> </a>
                        <a target="_blank" href="{{ $setting->instagram }}"><span><i class="fab fa-instagram"></i></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="foot address">
                    <h2>{{ trans('item.address') }}</h2>

                    @if(\Session::has('lang') && \Session::get('lang') == 'ar')
                        <p>{{ $setting->address_ar }}</p>
                    @endif
                    @if(\Session::has('lang') && \Session::get('lang') == 'en')
                            <p>{{ $setting->address_en }}</p>
                    @endif

                    <p>{{trans('item.email')}} : {{ $setting->email }}</p>
                    <p>{{trans('item.phone')}} : {{ $setting->phone }} </p>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="copy text-center">
    <p>{{trans('item.copy')}}</p>
</div>