@extends('layouts/app')

@section('content')

@include('layouts.menubar')
@php 

$features = DB::table('products')->where('status',1)->orderBy('id','DESC')->limit(8)->get();
$trend = DB::table('products')->where('status',1)->where('trend', 1)->orderBy('id','DESC')->limit(8)->get();
$best = DB::table('products')->where('status',1)->where('best_rated', 1)->orderBy('id','DESC')->limit(8)->get();
$hot = DB::table('products')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->select('products.*', 'brands.brand_logo')
                ->where('products.status', 1)->where('hot_deal', 1)->orderBy('id', 'DESC')->limit(3)
                ->get();
$odjeca = DB::table('products')->where('status', 1)->where('category_id', 2)->orderBy('id','DESC')->limit(8)->get();
$obuca = DB::table('products')->where('status', 1)->where('category_id', 3)->orderBy('id','DESC')->limit(8)->get();
$asesoari = DB::table('products')->where('status', 1)->where('category_id', 11)->orderBy('id','DESC')->limit(8)->get();
$torbe = DB::table('products')->where('status', 1)->where('category_id', 5)->orderBy('id','DESC')->limit(8)->get();
$muskarci = DB::table('categories')->where('id',14)->get();
$zene = DB::table('categories')->where('id',15)->get();
$ases = DB::table('categories')->where('id',11)->get();


@endphp
        <!-- Kategorije -->
        <div class="banner-area mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="banner-area-left ">
                            @foreach($muskarci as $musk)
                           <div class="banner-single pos-rltv fix mb-30">
                                <div class="banner-img"> 
                                    <img src="{{ asset($musk->categoryImage) }}" alt=""> 
                                </div>
                                <div class="banner-content">
                                    <div class="heading-title big-title heading-style pos-rltv">
                                        <h3 class=""><a href="#">{{ $musk->category_name }}</a></h3> 
                                    </div>
                                    <p>{{ $musk->description }}</p> <a href="#" class="btn-def" tabindex="0">Pogledaj</a> 
                                </div>
                           </div>
                           @endforeach
                           @foreach($zene as $zen)
                           <div class="banner-single pos-rltv fix">
                                <div class="banner-img left-type"> 
                                <img src="{{ asset($zen->categoryImage) }}" alt=""> 
                                </div>
                                <div class="banner-content left-type">
                                    <div class="heading-title big-title heading-style pos-rltv">
                                        <h3 class=""><a href="#">{{ $zen->category_name }}</a></h3> 
                                    </div>
                                    <p>{{$zen->description}} </p> <a href="#" class="btn-def" tabindex="0">Pogledaj</a> 
                                </div>
                           </div>
                           @endforeach
                        </div>
                    </div>
                    @foreach ($ases as $ass)
                    <div class="col-md-4 hidden-sm col-xs-12">
                        <div class="banner-img-2 pos-rltv"> <img src="{{ asset($ass->categoryImage) }}" alt=""> 

                        </div>
                        <div class="banner-content-2 mt-25">
                        <div class="heading-title big-title heading-style pos-rltv">
                                <h3 class=""><a href="#">{{ $ass->category_name }}</a></h3> 
                            </div>
                            <p> {{ $ass->description }} </p>
                            <a href="#" class="btn-def" tabindex="0">Pogledaj</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <br>
        <!--banner-area-are-end-->

        <!-- PONUDA SEDMICE -->
        <div class="branding-section-area">
            <div class="container">
                <div class="row">
                <div class="col-xs-12 text-center">
                        <div class="heading-title mb-40 text-center">
                            <br>
                            <h2 class="uppercase">Ponuda sedmice</h2> 
                        </div>
                    </div>

                    <div class="active-slider pos-rltv carosule-pagi cp-line pagi-02">
                        @foreach($hot as $ht)
                        <div class="single-slider">
                            <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="brand-img text-center">
                                    <img src="{{ asset('public/frontend/images/team/branding.png') }}" alt=""> 
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                <div class="brand-content ptb-55">
                                    <div class="brand-text color-lightgrey">
                                    <img src="{{ asset($ht->brand_logo)}}" style="height: 40px; width: 100px;" alt="">
                                        <h2 class="uppercase montserrat">{{ $ht->product_name}}</h2>
                                        @if($ht->discount_price == NULL)
                                        <h3 class="montserrat">{{ $ht->selling_price }} KM</h3>

                                        @else
                                        <h3 class="montserrat">{{ $ht->discount_price }} KM</h3>
                                        <h4 style="text-decoration: line-through;" class="montserrat">{{ $ht->selling_price }} KM</h4>

                                        @endif
                                        <p>{!! str_limit($ht->product_details, $limit = 600) !!}<div class="social-icon-wraper mt-35">
                                            <div class="social-icon">
                                                <ul>
                                                    <li><a data-id="{{ $ht->id }}" data-tooltip="Dodaj u Korpu" class="add-cart addcart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                                    <li><a data-id="{{ $ht->id }}" data-tooltip="Dodaj u Listu Želja" class="addwishlist w-list"><i class="zmdi zmdi-favorite-outline"></i></a></li>
                                                    <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal" tabindex="0"><i class="zmdi zmdi-eye"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="brand-timer shadow-box-2 mt-50">
                                        <div class="timer-wraper text-center">
                                            <div class="timer">
                                                <div data-countdown="2021/02/02"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- KRAJ PONUDA SEDMICE -->

        <!-- ZADNJE DODATI PROIZVODI -->
    <div class="discunt-featured-onsale-area pt-60">
    <div class="container">
        <div class="row">
        <div class="col-xs-12 text-center">
                        <div class="heading-title mb-40 text-center">
                            <h5 class="uppercase">Zadnje dodati proizvodi</h5> 
                        </div>
                    </div>
            <div class="product-area tab-cars-style">
                <div class="title-tab-product-category">
                    <div class="col-md-12 text-center">
                        <ul class="nav mb-40 heading-style-2" role="tablist">
                            <li role="presentation" class="active"><a href="#odjeca" aria-controls="odjeca" role="tab" data-toggle="tab">Odjeća</a></li>
                            <li role="presentation"><a href="#obuca" aria-controls="obuca" role="tab" data-toggle="tab">Obuća</a></li>
                            <li role="presentation"><a href="#torbe" aria-controls="torbe" role="tab" data-toggle="tab">Torbe</a></li>
                            <li role="presentation"><a href="#asesoari" aria-controls="asesoari" role="tab" data-toggle="tab">Asesoari</a></li>

                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="content-tab-product-category">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="odjeca">
                            <div class="total-new-arrival new-arrival-slider-active carsoule-btn">     
                                @foreach ($odjeca as $od)                      
                                <div class="col-md-3">
                                    <!-- Proizvod -->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="product-label">
                                                <div class="new">Novo</div>
                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}"> <img alt="" src="{{ asset($od->image_one) }}" class="primary-image"> <img alt="" src="{{ asset($od->image_two) }}" class="secondary-image"> </a>
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                    <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Korpu" class="add-cart addcart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                    <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Listu Želja" class="addwishlist w-list"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" data-tooltip="Brz Pregled" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}">{{$od->product_name }}</a> </div>
                                            <div class="prodcut-ratting-price">
                                            @if($od->discount_price == NULL)
                                                <div class="new-price"> {{ $od->selling_price }} KM </div><br>
                                            </div>
                                        @else
                                                <div class="new-price"> {{ $od->discount_price }} KM</div>
                                                <div style="text-decoration: line-through;" class="new-price"> {{ $od->selling_price }} KM</div><br>
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                    <!-- Kraj Proizvoda -->
                                </div>  
                                @endforeach                        
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane  fade in" id="obuca">
                            <div class="total-new-arrival new-arrival-slider-active carsoule-btn">                           
                            @foreach ($obuca as $ob)                      
                                <div class="col-md-3">
                                    <!-- Proizvod -->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="product-label">
                                                <div class="new">Novo</div>
                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}"> <img alt="" src="{{ asset($ob->image_one) }}" class="primary-image"> <img alt="" src="{{ asset($ob->image_two) }}" class="secondary-image"> </a>
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Korpu" class="add-cart addcart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                    <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Listu Želja" class="addwishlist w-list"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" data-tooltip="Brz Pregled" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}">{{$ob->product_name }}</a> </div>
                                            <div class="prodcut-ratting-price">
                                            @if($od->discount_price == NULL)
                                                <div class="new-price"> {{ $ob->selling_price }} KM </div><br>
                                            </div>
                                        @else
                                                <div class="new-price"> {{ $ob->selling_price }} KM</div>
                                                <div style="text-decoration: line-through;" class="new-price"> {{ $ob->selling_price }} KM</div><br>
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                    <!-- Kraj Proizvoda -->
                                </div>  
                                @endforeach                        
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane  fade in" id="torbe">
                            <div class="total-new-arrival new-arrival-slider-active carsoule-btn"> 
                            @foreach ($torbe as $to)                      
                                <div class="col-md-3">
                                    <!-- Proizvod -->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="product-label">
                                                <div class="new">Novo</div>
                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                <a href="{{ url('proizvod/detalji/'.$to->id.'/'.$to->product_name) }}"> <img alt="" src="{{ asset($to->image_one) }}" class="primary-image"> <img alt="" src="{{ asset($to->image_two) }}" class="secondary-image"> </a>
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Korpu" class="add-cart addcart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                    <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Listu Želja" class="addwishlist w-list"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" data-tooltip="Brz Pregled" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{ url('proizvod/detalji/'.$to->id.'/'.$od->product_name) }}">{{$to->product_name }}</a> </div>
                                            <div class="prodcut-ratting-price">
                                            @if($to->discount_price == NULL)
                                                <div class="new-price"> {{ $to->selling_price }} KM </div><br>
                                            </div>
                                        @else
                                                <div class="new-price"> {{ $to->selling_price }} KM</div>
                                                <div style="text-decoration: line-through;" class="new-price"> {{ $to->selling_price }} KM</div><br>
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                    <!-- Kraj Proizvoda -->
                                </div>  
                                @endforeach                        
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane  fade in" id="asesoari">
                            <div class="total-new-arrival new-arrival-slider-active carsoule-btn"> 
                            @foreach ($asesoari as $as)                      
                                <div class="col-md-3">
                                    <!-- Proizvod -->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="product-label">
                                                <div class="new">Novo</div>
                                            </div>
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}"> <img alt="" src="{{ asset($as->image_one) }}" class="primary-image"> <img alt="" src="{{ asset($as->image_two) }}" class="secondary-image"> </a>
                                            </div>
                                            <div class="product-icon socile-icon-tooltip text-center">
                                                <ul>
                                                <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Korpu" class="add-cart addcart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                                    <li><a data-id="{{ $od->id }}" data-tooltip="Dodaj u Listu Želja" class="addwishlist w-list"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" data-tooltip="Brz Pregled" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{ url('proizvod/detalji/'.$od->id.'/'.$od->product_name) }}">{{$as->product_name }}</a> </div>
                                            <div class="prodcut-ratting-price">
                                            @if($as->discount_price == NULL)
                                                <div class="new-price"> {{ $as->selling_price }} KM </div><br>
                                            </div>
                                        @else
                                                <div class="new-price"> {{ $as->selling_price }} KM</div>
                                                <div style="text-decoration: line-through;" class="new-price"> {{ $as->selling_price }} KM</div><br>
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                    <!-- Kraj Proizvoda -->
                                </div>  
                                @endforeach                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- KRAJ ZADNJE DODATIH PROIZVODA -->  
<br><br><br>
<!-- VIJESTI -->
<div class="blog-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">Vijesti</h5> </div> <br><br>
            </div>
            @php
                $vijesti = DB::table('posts')->orderBy('id','DESC')->get();

                @endphp

            <div class="total-blog-2">
            @foreach($vijesti as $vij)
                <div class="col-md-6">
                    <div class="single-blog-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-img pos-rltv product-overlay">
                                    <a href="#"><img src="{{asset($vij->post_image) }}" alt=""></a>
                                    <div class="date-wraper montserrat">
                                        <span> {{$vij->datum}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-content blog-content-2">
                                    <div class="blog-title">
                                        <h5 class="uppercase"><a href="#">{{ $vij->post_title_ba }}</a></h5>
                                        </div>
                                        <div class="blog-text">
                                            <p>{!! str_limit($vij->details_ba, $limit = 180) !!}</p>
                                        </div> 
                                        <a href="#" class="btn-def small montserrat mt-20">Pročitaj više</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- KRAJ VIJESTI -->

        <!-- BRZ PREGLED PROIZVODA -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                              <div class="product-images"> 
                                   <!--modal tab start-->
                                    <div class="portfolio-thumbnil-area-2">
                                        <div class="tab-content active-portfolio-area-2">
                                            <div role="tabpanel" class="tab-pane active" id="view1">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{ asset('public/frontend/images/product/01.jpg') }}" alt="Single portfolio" /></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view2">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{ asset('public/frontend/images/product/02.jpg') }}" alt="Single portfolio" /></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view3">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{ asset('public/frontend/images/product/03.jpg') }}" alt="Single portfolio" /></a>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="view4">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{ asset('public/frontend/images/product/04.jpg') }}" alt="Single portfolio" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-more-views-2">
                                            <div class="thumbnail-carousel-modal-2" data-tabs="tabs">
                                                <a href="#view1" aria-controls="view1" data-toggle="tab"><img src="{{ asset('public/frontend/images/product/01.jpg') }}" alt="" /></a>
                                                <a href="#view2" aria-controls="view2" data-toggle="tab"><img src="{{ asset('public/frontend/images/product/02.jpg') }}" alt="" /></a>
                                                <a href="#view3" aria-controls="view3" data-toggle="tab"><img src="{{ asset('public/frontend/images/product/03.jpg') }}" alt="" /></a>
                                                <a href="#view4" aria-controls="view4" data-toggle="tab"><img src="{{ asset('public/frontend/images/product/04.jpg') }}" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!--modal tab end-->
                                    <!-- .product-images -->
                                    <div class="product-info">
                                        <h1> Superdry Jakna</h1>
                                        <div class="price-box-3">
                                            <div class="s-price-box"> <span class="new-price">449 KM</span> <span class="old-price">360 KM</span> </div>
                                        </div> <a href="shop.html" class="see-all">Pogledaj vi[e</a>
                                        <div class="quick-add-to-cart">
                                            <form method="post" class="cart">
                                                <div class="numbers-row">
                                                    <input type="number" id="french-hens" value="3" min="1"> </div>
                                                <button class="single_add_to_cart_button" type="submit">Dodaj u Korpu</button>
                                            </form>
                                        </div>
                                        <div class="quick-desc">Superdry Muska jakna u više boja i veličina. Pogledajte više.. </div>
                                        <div class="social-sharing-modal">
                                            <div class="widget widget_socialsharing_widget">
                                                <h3 class="widget-title-modal">Sheruj Proizvoda</h3>
                                                <ul class="social-icons-modal">
                                                    <li><a target="_blank" title="Facebook" href="#" class="facebook m-single-icon"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a target="_blank" title="Twitter" href="#" class="twitter m-single-icon"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a target="_blank" title="Pinterest" href="#" class="pinterest m-single-icon"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a target="_blank" title="Google +" href="#" class="gplus m-single-icon"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a target="_blank" title="LinkedIn" href="#" class="linkedin m-single-icon"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .product-info -->
                                </div>
                                <!-- .modal-product -->
                            </div>
                            <!-- .modal-body -->
                        </div>
                        <!-- .modal-content -->
                    </div>
                    <!-- .modal-dialog -->
                </div>
                <!-- END Modal -->
            </div>
        <!-- END QUICKVIEW PRODUCT -->
    </div> 



    <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
      $('.addcart').on('click', function(){
         var id = $(this).data('id');
          if (id) {
             $.ajax({
                 url: " {{ url('add/to/cart/') }}/"+id,
                 type:"GET",
                 datType:"json",
                 success:function(data){
              const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true,
                   onOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                   }
                 })
 
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })
              }else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }
      });
 
    });
 
 
 </script>

    <script type="text/javascript">
    
    $(document).ready(function(){
      $('.addwishlist').on('click', function(){
         var id = $(this).data('id');
         if (id) {
             $.ajax({
                 url: " {{ url('add/wishlist/') }}/"+id,
                 type:"GET",
                 datType:"json",
                 success:function(data){
              const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true,
                   onOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                   }
                 })
 
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })
              }else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }
      });
 
    });
 
 
 </script>
@endsection