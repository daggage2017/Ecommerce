<div class="header">

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="slinks  @if(\Session::has('lang') && \Session::get('lang') == 'en') text-left @endif">
                        <a target="_blank" href="{{ $setting->facebook }}"><span><i class="fab fa-facebook-square"></i></span> </a>
                        <a target="_blank" href="{{ $setting->instagram }}"><span><i class="fab fa-instagram"></i></span> </a>
                        @if(\Session::has('lang') && \Session::get('lang') == 'ar')
                            <span> <a href="/lang/en">English </a></span>
                        @endif

                        @if(\Session::has('lang') && \Session::get('lang') == 'en')
                            <span> <a href="/lang/ar">العربية </a></span>
                        @endif

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="logo  @if(\Session::has('lang') && \Session::get('lang') == 'ar')  text-left @endif">
                        <img class="img-responsive" src="{{ asset('images/'. $setting->image) }}" alt="logo">
                    </div>
                </div>
            </div>
        </div><!--end top header -->

        <div class="bottom-header">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li data-class="slider"  class="active"><a href="/">{{ trans('nav.home') }} <span class="sr-only">(current)</span></a></li>
                            <li data-class="aboutus"><a href="{{ route('site.about') }}">{{ trans('nav.aboutus') }} </a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('nav.services') }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($services as $key => $s)

                                        @if(\Session::has('lang') && \Session::get('lang') == 'ar')
                                            <li class="text-right"><a href="{{  route('service', $s->id) }}">{{ $s->title_ar }}</a></li>
                                        @endif

                                        @if(\Session::has('lang') && \Session::get('lang') == 'en')
                                            <li class="text-left"><a href="{{  route('service', $s->id) }}">{{ $s->title_en }}</a></li>
                                        @endif

                                    @endforeach
                                </ul>
                            </li>

                            <li data-class="projects"><a href="{{ route('site.project') }}">{{ trans('nav.projects') }} </a></li>
                            <li data-class="contactus"><a href="{{ route('site.contact') }}">{{ trans('nav.contact') }}  </a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>

</div><!--end  header -->