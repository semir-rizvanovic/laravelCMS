@php
    $category = DB::table('categories')->get();
    $slajder = DB::table('slajder')->orderBy('id','DESC')->limit(4)->get();
    $ikonice = DB::table('ikonice')->orderBy('id','DESC')->limit(4)->get();


@endphp

        <!--slider area start-->
        <div class="slider-area pos-rltv carosule-pagi cp-line">
            <div class="active-slider">
                @foreach($slajder as $slajd)
                <div class="single-slider pos-rltv">
                    <div class="slider-img"><img src="{{ asset($slajd->slika) }}" alt=""></div>
                    <div class="slider-content pos-abs">
                        <h1 class="uppercase pos-rltv underline">{{ $slajd->naslov }}</h1>
                        <h4>{{ $slajd->opis }}</h4>
                        <br>

                        <a href="#" class="btn-def btn-white">Pogledaj</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--slider area start-->
        
        <!--delivery service start-->
        <div class="delivery-service-area ptb-30">
            <div class="container">
                <div class="row">
                @foreach($ikonice as $ikon)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-service shadow-box text-center">
                            <img src="{{ asset($ikon->slika) }}" alt="">
                            <br>
                            <h6>{{ $ikon->opis }} </h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--delivery service start-->
