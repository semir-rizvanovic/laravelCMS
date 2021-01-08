@extends('layouts/app')

@section('content')
        <!--breadcumb area start -->
        <div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Proizvodi u Korpi</h5> </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Vrati se na Početnu" href="{{ url('/') }}">Početna</a></li>
                    <li class="active">Korpa</li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->
        
        <!--cart-checkout-area start -->
        <div class="cart-checkout-area  pt-30">
            <div class="container">
                <div class="row">
                    <div class="product-area">
                        <div class="title-tab-product-category">
                            <div class="col-md-12 text-center pb-60">
                                <ul class="nav heading-style-3" role="tablist">
                                    <li role="presentation" class="active shadow-box"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab"><span>01</span>Proizvodi </a></li>
                                    <li role="presentation" class="shadow-box"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab"><span>02</span>Adresa </a></li>
                                    <li role="presentation" class="shadow-box"><a href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab"><span>03</span> Završi Narudžbu</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <div class="content-tab-product-category pb-70">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="cart">
                                    <!-- cart are start-->
                                    <div class="cart-page-area">
                                       <form method="post" action="#">
                                                   <div class="table-responsive mb-20">
                                                    <table class="shop_table-2 cart table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-thumbnail ">Slika</th>
                                                                <th class="product-name ">Naziv Proizvoda</th>
                                                                <th class="product-color ">Boja</th>
                                                                <th class="product-size ">Veličina</th>
                                                                <th class="product-price ">Cijena</th>
                                                                <th class="product-quantity">Količina</th>
                                                                <th class="product-subtotal ">Total</th>
                                                                <th class="product-remove"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($cart as $row)

                                                            <tr class="cart_item">
                                                                <td class="item-img">
                                                                    <a href="#"><img src="{{asset($row->options->image) }}" alt=""> </a>
                                                                </td>
                                                                <td class="item-title">{{ $row->name }} <a href="#"></a></td>
                                                                @if( $row->options->color == NULL)
                                                                <td class="item-color"> Nije odabrana </td>
                                                                @else
                                                                <td class="item-color"> {{ $row->options->color }} </td>
                                                                @endif
                                                                @if ($row->options->size == NULL)
                                                                <td class="item-size"> Nije odabrana </td>
                                                                @else
                                                                <td class="item-size"> {{ $row->options->size }} </td>
                                                                @endif
                                                                <td class="item-price"> {{ $row->price }} KM</td>
                                                                <td class="item-qty">
                                                                    <div class="cart-quantity">
                                                                        <div class="product-qty">
                                                                            <div class="cart-quantity"> 
                                                                                <div class="cart-plus-minus">
                                                                                <form method="post" action="{{ route('update.korpa') }}">
                                                                                @csrf
                                                                                    <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                                                    <button type="submit" class="dec qtybutton">-</button>
                                                                                    <input value="{{ $row->qty }}" name="qty" class="cart-plus-minus-box" type="name">
                                                                                    <button type="submit" class="inc qtybutton">+</button> 
                                                                                </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="total-price"><strong> {{ $row->price*$row->qty }} KM</strong></td>
                                                                <td class="remove-item"><a href="{{ url('remove/cart/'.$row->rowId) }}"><i class="fa fa-trash-o"></i></a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    </div>


                                                    <div class="cart-bottom-area">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-7 col-xs-12">
                                                                <div class="update-coupne-area">
                                                                    <div class="update-continue-btn text-right pb-20">
                                                                    <a href="#" class="btn-def btn2">Naruči Proizvode</a>
                                                                        <a href="{{ url('/') }}" class="btn-def btn2">Nastavi Kupovati</a>
                                                                    </div>
                                                                    <div class="coupn-area">
                                                                        <div class="catagory-title cat-tit-5 mb-20">
                                                                            <h3>Kupon</h3> 
                                                                            <p>Unesite kupon ako imate</p>
                                                                        </div>                                           
                                                                            <div class="input-box input-box-2 mb-20">
                                                                                <input type="text" placeholder="Kupon" class="info" name="subject"> 
                                                                            </div>
                                                                            <a href="#" class="btn-def btn2">Iskoristi Kupon</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                                <div class="cart-total-area">
                                                                    <div class="catagory-title cat-tit-5 mb-20 text-right">
                                                                            <h3>Total u Korpi</h3> 
                                                                     </div>
                                                                     <div class="sub-shipping">
                                                                         <p>Iznos <span>{{ Cart::subtotal() }} KM</span></p>
                                                                         <p>Dostava 
                                                                         @if ( Cart::subtotal() <= 100)    
                                                                         <span> 0 KM</span></p>
                                                                         @else
                                                                         <span> 7 KM</span></p>
                                                                         @endif
                                                                     </div>
                                                                     <div class="process-cart-total">
                                                                         <p>Total <span>{{ Cart::subtotal() }} KM</span></p>
                                                                     </div>
                                                                     <div class="process-checkout-btn text-right">
                                                                         <a class="btn-def btn2" href="#checkout">Naruči</a>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                    </div>
                                    <!-- cart are end-->
                                </div>
                                <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                    <!-- Checkout are start-->
                                    <div class="checkout-area">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="coupne-customer-area mb50">
                                                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                      <div class="panel panel-checkout">
                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                          <h4 class="panel-title">
                                                           Već imate račun? 
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                               Loguj se
                                                            </a>
                                                          </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                          <div class="panel-body">
                                                            <div class="sm-des pb20">
                                                                Ako ste već registrovani molimo unesite Email adresu i password.
                                                            </div>
                                                            <div class="first-last-area">
                                                                <div class="input-box mtb-20">
                                                                    <label>Email Adresa</label>
                                                                    <input type="email" placeholder="Your Email" class="info" name="email">
                                                                </div>
                                                                <div class="input-box mb-20">
                                                                    <label>Password</label>
                                                                    <input type="password" placeholder="Password" class="info" name="padd">
                                                                </div>
                                                                <div class="frm-action cc-area">
                                                                    <div class="input-box tci-box">
                                                                       <a href="#" class="btn-def btn2">Loguj se</a>
                                                                    </div>
                                                                    <span>
                                                                <input type="checkbox" class="remr"> Zapamti me 
                                                                </span>
                                                                    <a class="forgotten forg" href="#">Zaboravili ste Password ?</a>
                                                                </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="panel panel-checkout">
                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                          <h4 class="panel-title">
                                                           Imate Kupon? 
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                               Kliknite ovdje da unesete
                                                            </a>
                                                          </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                          <div class="panel-body coupon-body">

                                                            <div class="first-last-area">
                                                                <div class="input-box mtb-20">
                                                                    <input type="text" placeholder="Coupon Code" class="info" name="code">
                                                                </div>
                                                                <div class="frm-action">
                                                                    <div class="input-box tci-box">
                                                                       <a href="#" class="btn-def btn2">Iskoristi Kupon</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>  
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="billing-details">
                                                                <div class="contact-text right-side">
                                                                      <h2>Osnovni Podaci</h2>
                                                            <form action="#">
                                                              <div class="row">
                                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-box mb-20">
                                                                            <label>Ime <em>*</em></label>
                                                                            <input type="text" name="namm" class="info" placeholder="First Name">
                                                                        </div>
                                                                   </div>
                                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-box mb-20">
                                                                        <label>Prezime<em>*</em></label>
                                                                        <input type="text" name="namm" class="info" placeholder="Last Name">
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="input-box mb-20">
                                                                            <label>Naziv Firme</label>
                                                                            <input type="text" name="cpany" class="info" placeholder="Company Name"> 
                                                                        </div>
                                                                    </div>

                                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-box mb-20">
                                                                        <label>Email Adresa<em>*</em></label>
                                                                        <input type="email" name="email" class="info" placeholder="Your Email">
                                                                    </div>
                                                                    </div>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-box mb-20">
                                                                        <label>Broj Telefona<em>*</em></label>
                                                                        <input type="text" name="phone" class="info" placeholder="Phone Number">
                                                                    </div>
                                                               </div>

                                                               <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-box mb-20">
                                                                <label>Država <em>*</em></label>
                                                                    <select class="selectpicker select-custom" data-live-search="true">
                                                                      <option data-tokens="Bangladesh">Bangladesh</option>
                                                                      <option data-tokens="India">India</option>
                                                                      <option data-tokens="Pakistan">Pakistan</option>
                                                                      <option data-tokens="Pakistan">Pakistan</option>
                                                                      <option data-tokens="Srilanka">Srilanka</option>
                                                                      <option data-tokens="Nepal">Nepal</option>
                                                                      <option data-tokens="Butan">Butan</option>
                                                                      <option data-tokens="USA">USA</option>
                                                                      <option data-tokens="England">England</option>
                                                                      <option data-tokens="Brazil">Brazil</option>
                                                                      <option data-tokens="Canada">Canada</option>
                                                                      <option data-tokens="China">China</option>
                                                                      <option data-tokens="Koeria">Koeria</option>
                                                                      <option data-tokens="Soudi">Soudi Arabia</option>
                                                                      <option data-tokens="Spain">Spain</option>
                                                                      <option data-tokens="France">France</option>
                                                                    </select>

                                                                </div>
                                                               </div>

                                                               <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-box mb-20">
                                                                    <label>Adresa <em>*</em></label>
                                                                    <input type="text" name="add1" class="info mb-10" placeholder="Street Address">
                                                                    <input type="text" name="add2" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)">
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-box mb-20">
                                                                        <label>Grad <em>*</em></label>
                                                                        <input type="text" name="add1" class="info" placeholder="Town/City">
                                                                    </div>
                                                                </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-box">
                                                                            <label>Poštanski Broj<em>*</em></label>
                                                                            <input type="text" name="zipcode" class="info" placeholder="Zip Code">
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="create-acc clearfix mtb-20">
                                                                        <div class="acc-toggle">
                                                                            <input type="checkbox" id="acc-toggle">
                                                                            <label for="acc-toggle">Kreiraj Račun ?</label>
                                                                        </div>
                                                                        <div class="create-acc-body">
                                                                           <div class="sm-des">
                                                                              Kreiraj račun sa gore unešenim podacima. Unesite Password i potvrdite ga.
                                                                           </div>
                                                                            <div class="input-box">
                                                                                <label>Password <em>*</em></label>
                                                                                <input type="password" name="pass" class="info" placeholder="Password">
                                                                            </div>
                                                                            <div class="input-box">
                                                                                <label>Potvrdi password <em>*</em></label>
                                                                                <input type="password" name="pass" class="info" placeholder="Password">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="billing-details">
                                                                <div class="right-side">
                                                                    <div class="ship-acc clearfix">
                                                                    <div class="ship-toggle pb20">
                                                                        <input type="checkbox" id="ship-toggle">
                                                                        <label for="ship-toggle">Ship to a different address?</label>
                                                                    </div>
                                                                    <div class="ship-acc-body">
                                                                        <form action="#">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>First Name <em>*</em></label>
                                                                                        <input type="text" name="namm" class="info" placeholder="First Name"> </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Last Name<em>*</em></label>
                                                                                        <input type="text" name="namm" class="info" placeholder="Last Name"> </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Company Name</label>
                                                                                        <input type="text" name="cpany" class="info" placeholder="Company Name"> </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email Address<em>*</em></label>
                                                                                        <input type="email" name="email" class="info" placeholder="Your Email"> </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Phone Number<em>*</em></label>
                                                                                        <input type="text" name="phone" class="info" placeholder="Phone Number"> </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Country <em>*</em></label>
                                                                                        <select class="selectpicker select-custom" data-live-search="true">
                                                                                            <option data-tokens="Bangladesh">Bangladesh</option>
                                                                                            <option data-tokens="India">India</option>
                                                                                            <option data-tokens="Pakistan">Pakistan</option>
                                                                                            <option data-tokens="Pakistan">Pakistan</option>
                                                                                            <option data-tokens="Srilanka">Srilanka</option>
                                                                                            <option data-tokens="Nepal">Nepal</option>
                                                                                            <option data-tokens="Butan">Butan</option>
                                                                                            <option data-tokens="USA">USA</option>
                                                                                            <option data-tokens="England">England</option>
                                                                                            <option data-tokens="Brazil">Brazil</option>
                                                                                            <option data-tokens="Canada">Canada</option>
                                                                                            <option data-tokens="China">China</option>
                                                                                            <option data-tokens="Koeria">Koeria</option>
                                                                                            <option data-tokens="Soudi">Soudi Arabia</option>
                                                                                            <option data-tokens="Spain">Spain</option>
                                                                                            <option data-tokens="France">France</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Address <em>*</em></label>
                                                                                        <input type="text" name="add1" class="info mb-10" placeholder="Street Address">
                                                                                        <input type="text" name="add2" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)"> </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Town/City <em>*</em></label>
                                                                                        <input type="text" name="add1" class="info" placeholder="Town/City"> </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>State/Divison <em>*</em></label>
                                                                                        <select class="selectpicker select-custom" data-live-search="true">
                                                                                            <option data-tokens="Barisal">Barisal</option>
                                                                                            <option data-tokens="Dhaka">Dhaka</option>
                                                                                            <option data-tokens="Kulna">Kulna</option>
                                                                                            <option data-tokens="Rajshahi">Rajshahi</option>
                                                                                            <option data-tokens="Sylet">Sylet</option>
                                                                                            <option data-tokens="Chittagong">Chittagong</option>
                                                                                            <option data-tokens="Rangpur">Rangpur</option>
                                                                                            <option data-tokens="Maymanshing">Maymanshing</option>
                                                                                            <option data-tokens="Cox">Cox's Bazar</option>
                                                                                            <option data-tokens="Saint">Saint Martin</option>
                                                                                            <option data-tokens="Kuakata">Kuakata</option>
                                                                                            <option data-tokens="Sajeq">Sajeq</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Post Code/Zip Code<em>*</em></label>
                                                                                        <input type="text" name="zipcode" class="info" placeholder="Zip Code"> </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    </div>
                                                                <div class="form">
                                                                    <div class="input-box">
                                                                        <label>Order Notes</label>
                                                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="area-tex"></textarea>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout are end-->
                                </div>
                                <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                                    <div class="row">
                                        <div class="col-xs-12">
                                        <div class="checkout-payment-area">
                                            <div class="checkout-total mt20">
                                               <h3>Your order</h3>
                                           <form action="#" method="post">
                                           <div class="table-responsive">
                                                <table class="checkout-area table">
                                               <thead>
                                                <tr class="cart_item check-heading">
                                                    <td class="ctg-type"> Product</td>
                                                    <td class="cgt-des"> Total</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="cart_item check-item prd-name">
                                                        <td class="ctg-type"> Aenean sagittis × <span>1</span></td>
                                                        <td class="cgt-des"> $1,026.00</td>
                                                    </tr>
                                                    <tr class="cart_item check-item prd-name">
                                                        <td class="ctg-type"> Aenean sagittis × <span>1</span></td>
                                                        <td class="cgt-des"> $1,026.00</td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="ctg-type"> Subtotal</td>
                                                        <td class="cgt-des">$2,052.00</td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="ctg-type">Shipping</td>
                                                            <td class="cgt-des ship-opt">
                                                                <div class="shipp">
                                                                    <input type="radio" id="pay-toggle" name="ship">
                                                                    <label for="pay-toggle">Flat Rate: <span>$03</span></label>
                                                                </div>
                                                                <div class="shipp">
                                                                    <input type="radio" id="pay-toggle2" name="ship">
                                                                    <label for="pay-toggle2">Free Shipping</label>
                                                                </div>
                                                         </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="ctg-type crt-total"> Total</td>
                                                        <td class="cgt-des prc-total"> $ 2,055.00 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                           </div>
                                        </form>
                                        </div>
                                            <div class="payment-section mt-20 clearfix">
                                                <div class="pay-toggle">
                                                    <form action="#">
                                                       <div class="pay-type-total">
                                                        <div class="pay-type">
                                                            <input type="radio" id="pay-toggle01" name="pay">
                                                            <label for="pay-toggle01">Direct Bank Transfer</label>
                                                        </div>
                                                        <div class="pay-type">
                                                            <input type="radio" id="pay-toggle02" name="pay">
                                                            <label for="pay-toggle02">Cheque Payment</label>
                                                        </div>
                                                        <div class="pay-type">
                                                            <input type="radio" id="pay-toggle03" name="pay">
                                                            <label for="pay-toggle03">Cash on Delivery</label>
                                                        </div>
                                                        <div class="pay-type">
                                                            <input type="radio" id="pay-toggle04" name="pay">
                                                            <label for="pay-toggle04">Paypal</label>
                                                        </div>
                                                        </div>
                                                        <div class="input-box mt-20">
                                                            <a class="btn-def btn2" href="#">Place order</a>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!--cart-checkout-area end--> 




@endsection