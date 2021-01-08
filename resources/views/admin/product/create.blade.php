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
          <h6 class="card-body-title">Dodaj Proizvod
          <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">Svi Proizvodi</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Unesite informacije o novom proizvodu. Polja označena sa <span class="tx-danger">*</span> su obavezna !</p>
        <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Naziv Proizvoda: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" placeholder="Unesi naziv proizvoda">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Šifra Proizvoda: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" placeholder="Unesi šifru proizvoda">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kategorija: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Odaberi Kategoriju" name="category_id">
                    <option label="Odaberi Kategoriju"></option>
                    @foreach ($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Podkategorija: </span></label>
                  <select class="form-control select2" data-placeholder="Odaberi Podkategoriju" name="subcategory_id">
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brend: </span></label>
                  <select class="form-control select2" data-placeholder="Odaberi Brend" name="brand_id">
                    @foreach ($brand as $br)
                    <option label="Odaberi Brend"></option>
                    <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Količina: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" placeholder="Unesi količinu koja je na stanju">
                </div>
              </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Veličine: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Boje: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Cijena: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" placeholder="Unesi cijenu">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Snižena Cijena: </span></label>
                  <input class="form-control" type="text" name="discount_price" placeholder="Unesi sniženu cijenu">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Promotivni Text </span></label>
                  <input class="form-control" type="text" name="product_text" placeholder="Unesi Promotivni text">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Opis proizvoda: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="product_details"></textarea>
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: </span></label>
                  <input class="form-control" name="video_link" placeholder="Unesi Video Link" >
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Glavna Slika </span></label>
                    <label class="custom-file">
                        <input type="file" id="file2" class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                        <span class="custom-file-control custom-file-control-primary"></span>
                        <img src="#" id="one" style="margin-top:5px;">
                    </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slika 2 </span></label>
                    <label class="custom-file">
                        <input type="file" id="file2" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                        <span class="custom-file-control custom-file-control-primary"></span>
                        <img src="#" id="two" style="margin-top:5px;">
                    </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slika 3 </span></label>
                    <label class="custom-file">
                        <input type="file" id="file2" class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                        <span class="custom-file-control custom-file-control-primary"></span>
                        <img src="#" id="three" style="margin-top:5px;">
                    </label>
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
        <hr>
        <h2 style="text-align:center;"> Slajderi </h2>
        <br>
        <div class="row">
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="main_slider" value="1">
                <span>Glavni Slajder</span>
            </label>
            </div> <!-- col-4 -->
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="hot_deal" value="1">
                <span>Ponuda Sedmice</span>
            </label>
            </div> <!-- col-4 -->            
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="best_rated" value="1">
                <span>Najbolje Ocjenjeni</span>
            </label>
            </div> <!-- col-4 -->            
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="mid_slider" value="1">
                <span>Srednji Slajder</span>
            </label>
            </div> <!-- col-4 -->            
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="hot_new" value="1">
                <span>Zadnje dodati</span>
            </label>
            </div> <!-- col-4 -->
            <div class="col-lg-4">
            <label class="ckbox">
                <input type="checkbox" name="trend" value="1">
                <span>Popularno</span>
            </label>
            </div> <!-- col-4 -->
        </div><!-- row -->
        <hr>


            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Dodaj</button>
              <button class="btn btn-secondary">Zatvori</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>
    </div><!-- row -->


    <!-- ########## END: MAIN PANEL ########## -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>

<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection
