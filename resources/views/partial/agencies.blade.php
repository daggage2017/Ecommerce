
<div class="agencies">
   <div class="container">
       <h2 class="text-center">{{ trans('nav.agencies') }}</h2>
       <hr>
       <div class="row">
           @foreach($agencies as $key => $a)
           <div class="col-xs-12 col-sm-6 col-md-3">
               <div class="agencie">
                   <div class="agencie-img">
                       <img class="img-responsive img-thumbnail"  src ="{{ asset('images/agencies/'. $a->image) }}" alt="agencies">
                   </div>
                   <h3>
                       @if(\Session::has('lang') && \Session::get('lang') == 'ar')
                           {{ $a->title_ar }}
                       @endif

                       @if(\Session::has('lang') && \Session::get('lang') == 'en')
                            {{ $a->title_en }}
                       @endif

                   </h3>
               </div>
           </div>
        @endforeach
       </div>
   </div>
</div>