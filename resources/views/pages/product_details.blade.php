@extends('layouts.app')

@section('content')

        <!-- Kategorije i podkategorije -->
        <div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Detalji o Proizvodu</h5> </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Vrati se na početnu" href="{{url('') }}">Početna</a></li>
                    <li class="active">{{ $product->category_name }} / {{ $product->subcategory_name }} / {{ $product->product_name }}</li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->
        
        <!--single-protfolio-area are start-->
        <div class="single-protfolio-area ptb-70">
          <div class="container">
              <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                       <div class="portfolio-thumbnil-area">
                        <div class="product-more-views">
                            <div class="tab_thumbnail" data-tabs="tabs">
                                <div class="thumbnail-carousel">
                                    <ul>
                                       <li class="active">
                                        <a href="#view11" class="shadow-box" aria-controls="view11" data-toggle="tab"><img src="{{ asset($product->image_one) }}" alt="" /></a></li>
                                       <li>
                                        <a href="#view22" class="shadow-box" aria-controls="view22" data-toggle="tab"><img src="{{ asset($product->image_two) }}" alt="" /></a></li>
                                       <li>
                                        <a href="#view33" class="shadow-box" aria-controls="view33" data-toggle="tab"><img src="{{ asset($product->image_three) }}" alt="" /></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content active-portfolio-area pos-rltv">
                           <div class="social-tag">
                              <a href="#"><i class="zmdi zmdi-share"></i></a>
                           </div>
                            <div role="tabpanel" class="tab-pane active" id="view11">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="{{ asset($product->image_one) }}"><img src="{{ asset($product->image_one) }}" alt="Single portfolio" /></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view22">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="{{ asset($product->image_two) }}"><img src="{{ asset($product->image_two) }}" alt="Single portfolio" /></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view33">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="{{ asset($product->image_three) }}"><img src="{{ asset($product->image_three) }}" alt="Single portfolio" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="single-product-description">
                           <div class="sp-top-des">
                                <h3>{{ $product->product_name }} <span>({{$product->category_name}} / {{$product->subcategory_name}})</span></h3>
                                <div class="prodcut-ratting-price">
                                    <div class="prodcut-ratting"> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                        <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a> 
                                    </div>
                                    <div class="prodcut-price">
                                    @if($product->discount_price == NULL)
                                    <div class="new-price"> {{ $product->selling_price }} KM </div>
                                    @else
                                    <div class="new-price"> {{ $product->discount_price }} KM </div>
                                        <div class="old-price"><del>{{ $product->selling_price }} KM</del> </div>

                                    @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sp-des">
                                <p>{!! str_limit($product->product_details, $limit = 600) !!}</p>
                            </div>
                        <form action="{{url('cart/product/add/'.$product->id) }}" method="POST" id="myform">
                            @csrf

                            <div class="sp-bottom-des">
                            @if($product->product_color == NULL)
                            @else
                            <div class="single-product-option">
                                <div class="sort product-type">
                                    <label>Boja: </label>
                                    <select id="input-sort-color" name="color" style="margin-left: 29px;" >
                                    @foreach($product_color as $color)   
                                        <option value="{{ $color }}">{{ $color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                @if($product->product_size == NULL)
                                @else
                                <div class="sort product-type">
                                    <label>Veličina: </label>
                                    <select id="input-sort-size" name="size">
                                    @foreach($product_size as $size)   
                                        <option value="{{ $size }}">{{ $size }} - veličina</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="quantity-area">
                                <label>Količina :</label>
                                <div class="cart-quantity">
                                        <div class="product-qty">
                                            <div class="cart-quantity">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                        <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="social-icon socile-icon-style-1">
                                <ul>
                               <li><button data-tooltip="Add To Cart" class="add-cart add-cart-text" data-placement="left" tabindex="0" type="submit">Dodaj u Korpu<i class="fa fa-cart-plus"></i></button></li> 
                                    <li><a href="#" data-tooltip="Wishlist" class="w-list" tabindex="0"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal" tabindex="0"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            </form>

                      </div>
                  </div>
              </div>
          </div>  
        </div>
        </div>
        <!--single-protfolio-area are start-->
        
        <!--descripton-area start -->
        <div class="descripton-area">
            <div class="container">
                <div class="row">
                    <div class="product-area tab-cars-style">
                        <div class="title-tab-product-category">
                            <div class="col-md-12 text-center">
                                <ul class="nav mb-40 heading-style-2" role="tablist">
                                    <li role="presentation" class="active"><a href="#opis" aria-controls="opis" role="tab" data-toggle="tab">Opis</a></li>
                                    <li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
                                    <li role="presentation"><a href="#tagovi" aria-controls="tagovi" role="tab" data-toggle="tab">Tagovi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <div class="content-tab-product-category">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fix fade in active" id="opis">
                                    <div class="review-wraper">
                                    {!! $product->product_details !!}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fix fade in" id="video">
                                    <div class="review-wraper">
                                    {{ $product->video_link }}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fix fade in" id="tagovi">
                                    <ul class="tag-filter">
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Women</a></li>
                                        <li><a href="#">Winter</a></li>
                                        <li><a href="#">Street Style</a></li>
                                        <li><a href="#">Style</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Collection</a></li>
                                        <li><a href="#">Spring 2016</a></li>
                                        <li><a href="#">Street Style</a></li>
                                        <li><a href="#">Style</a></li>
                                        <li><a href="#">Shop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!--descripton-area end--> 
        
        <!--new arrival area start-->
        <div class="new-arrival-area ptb-70">
            <div class="container">
                <div class="row">
                   <div class="col-xs-12 text-center">
                       <div class="heading-title heading-style pos-rltv mb-50 text-center">
                           <h5 class="uppercase">Povezani Proizvodi</h5>
                       </div>
                   </div>
                   <div class="clearfix"></div>
                    <div class="total-new-arrival new-arrival-slider-active carsoule-btn">                           
                        <div class="col-md-3">
                            <!-- single product start-->
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="product-label">
                                        <div class="new">New</div>
                                    </div>
                                    <div class="single-prodcut-img  product-overlay pos-rltv">
                                        <a href="single-product.html"> <img alt="" src="images/product/01.jpg" class="primary-image"> <img alt="" src="images/product/02.jpg" class="secondary-image"> </a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a> </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-price">
                                            <div class="new-price"> $220 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end-->
                        </div>                          
                        <div class="col-md-3">
                            <!-- single product start-->
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="single-prodcut-img  product-overlay pos-rltv">
                                        <a href="single-product.html"> <img alt="" src="images/product/03.jpg" class="primary-image"> <img alt="" src="images/product/04.jpg" class="secondary-image"> </a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a> </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-price">
                                            <div class="new-price"> $220 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end-->
                        </div>                          
                        <div class="col-md-3">
                            <!-- single product start-->
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="product-label">
                                        <div class="new">Sale</div>
                                    </div>
                                    <div class="single-prodcut-img  product-overlay pos-rltv">
                                        <a href="single-product.html"> <img alt="" src="images/product/02.jpg" class="primary-image"> <img alt="" src="images/product/03.jpg" class="secondary-image"> </a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a> </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-ratting"> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star-o"></i></a> 
                                        </div>
                                        <div class="prodcut-price">
                                            <div class="new-price"> $220 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end-->
                        </div>                          
                        <div class="col-md-3">
                            <!-- single product start-->
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="single-prodcut-img  product-overlay pos-rltv">
                                        <a href="single-product.html"> <img alt="" src="images/product/04.jpg" class="primary-image"> <img alt="" src="images/product/03.jpg" class="secondary-image"> </a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a> </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-price">
                                            <div class="new-price"> $220 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end-->
                        </div>                          
                        <div class="col-md-3">
                            <!-- single product start-->
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="single-prodcut-img  product-overlay pos-rltv">
                                        <a href="single-product.html"> <img alt="" src="images/product/05.jpg" class="primary-image"> <img alt="" src="images/product/06.jpg" class="secondary-image"> </a>
                                    </div>
                                    <div class="product-icon socile-icon-tooltip text-center">
                                        <ul>
                                            <li><a href="#" data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="fa fa-cart-plus"></i></a></li>
                                            <li><a href="#" data-tooltip="Wishlist" class="w-list"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" data-tooltip="Compare" class="cpare"><i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".modal"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="prodcut-name"> <a href="single-product.html">Quisque fringilla</a> </div>
                                    <div class="prodcut-ratting-price">
                                        <div class="prodcut-ratting"> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star"></i></a> 
                                            <a href="#"><i class="fa fa-star-o"></i></a> </div>
                                        <div class="prodcut-price">
                                            <div class="new-price"> $220 </div>
                                            <div class="old-price"> <del>$250</del> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--new arrival area end-->
 
 
 </script>


    @endsection