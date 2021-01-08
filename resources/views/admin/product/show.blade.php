@extends('admin.admin_layouts')

@section('admin_content')
   <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Gema.ba</a>
        <span class="breadcrumb-item active">Proizvodi</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Informacije o Proizvodu
          <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">Svi Proizvodi</a>
          </h6>
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Naziv Proizvoda: <span class="tx-danger">*</span></label>
                  <br>
                  <strong> {{ $product->product_name }} </strong>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Šifra Proizvoda: <span class="tx-danger">*</span></label>
                  <br>
                  <strong> {{ $product->product_code }} </strong>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kategorija: <span class="tx-danger">*</span></label>
                    <br>
                    <strong>{{ $product->category_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Podkategorija: </span></label>
                    <br>
                    <strong>{{ $product->subcategory_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brend: </span></label>
                  <br>
                    <strong>{{ $product->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Količina: <span class="tx-danger">*</span></label>
                  <br>
                    <strong>{{ $product->product_quantity }}</strong>
                </div>
              </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Veličine: <span class="tx-danger">*</span></label>
                  <br>
                    <strong>{{ $product->product_size }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Boje: <span class="tx-danger">*</span></label>
                  <br>
                    <strong>{{ $product->product_color }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Cijena: <span class="tx-danger">*</span></label>
                  <br>
                    <strong>{{ $product->selling_price }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Snižena Cijena: </span></label>
                  <br>
                    <strong>{{ $product->discount_price }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Promotivni Text </span></label>
                  <br>
                    <strong>Promotivni Text</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Opis proizvoda: <span class="tx-danger">*</span></label>
                  <br>
                  <p><b>  {!! $product->product_details !!} </b></p>
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: </span></label>
                  <br>
                    <strong>{{ $product->video_link }}</strong>
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Glavna Slika </span></label>
                    <label class="custom-file"><br>
                    <img src=" {{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
                    </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slika 2 </span></label>
                    <label class="custom-file"><br>
                    <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
                    </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slika 3 </span></label>
                    <label class="custom-file"><br>
                    <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">
                    </label>
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
        <hr>
        <h2 style="text-align:center;"> Slajderi </h2>
        <br>
        <div class="row">
            <div class="col-lg-4">
            <label class="">
         @if($product->main_slider == 1)
         <span class="badge badge-success">Aktivan</span>

         @else
       <span class="badge badge-danger">Neaktivan</span>
         @endif 

          <span>Glavni Slajder</span>
        </label>
            </div> <!-- col-4 -->
            <div class="col-lg-4">
            <label class="">
         @if($product->hot_deal == 1)
         <span class="badge badge-success">Aktivan</span>

         @else
       <span class="badge badge-danger">Neaktivan</span>
         @endif 
          
          <span>Ponuda Sedmice</span>
        </label>
            </div> <!-- col-4 -->            
         <div class="col-lg-4">
            <label class="">
         @if($product->best_rated == 1)
            <span class="badge badge-success">Aktivan</span>
         @else
            <span class="badge badge-danger">Neaktivan</span>
         @endif 
          <span>Najbolje Ocjenjeni</span>
        </label>            
        </div> <!-- col-4 -->            
            <div class="col-lg-4">
            <label class="">
         @if($product->trend == 1)
            <span class="badge badge-success">Aktivan</span>

         @else
            <span class="badge badge-danger">Neaktivan</span>
         @endif 
        
          <span>Popularno </span>
        </label>
            </div> <!-- col-4 -->            
            <div class="col-lg-4">
            <label class="">
         @if($product->mid_slider == 1)
         <span class="badge badge-success">Aktivan</span>

         @else
       <span class="badge badge-danger">Neaktivan</span>
         @endif 
          
          <span>Srednji Slajder</span>
        </label>
            </div> <!-- col-4 -->
            <div class="col-lg-4">
            <label class="">
         @if($product->hot_new == 1)
         <span class="badge badge-success">Aktivan</span>

         @else
       <span class="badge badge-danger">Neaktivan</span>
         @endif 
          
          <span>Zadnje Dodati </span>
        </label>
            </div> <!-- col-4 -->
        </div><!-- row -->
        <hr>

          </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- row -->


    <!-- ########## END: MAIN PANEL ########## -->


@endsection
