@extends('admin.admin_layouts')

@section('admin_content')

@php
 $vijestiKategorija = DB::table('post_category')->get();
@endphp

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Gema.ba</a>
        <span class="breadcrumb-item active">Vijesti</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Uredi Vijest
          <a href="{{ route('all.news') }}" class="btn btn-success btn-sm pull-right">Sve Vijesti</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Unesite Vijest. Polja označena sa <span class="tx-danger">*</span> su obavezna !</p>
        <form method="post" action="{{ url('update/news/'.$post->id) }}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Naslov : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_ba" value="{{ $post->post_title_ba }}">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Datum: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="datum" value="{{ $post->datum }}">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kategorija (Bosanski): <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Odaberi Kategoriju" name="category_id">
                    <option label="Odaberi Kategoriju"></option>
                    @foreach ($vijestiKategorija as $row)
                    <option value="{{ $row->id }}" 
                    <?php if($row->id == $post->category_id) { echo "selected"; } ?>> {{ $row->category_name_ba }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kategorija (Engleski): <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Odaberi Kategoriju" name="category_id">
                    <option label="Odaberi Kategoriju"></option>
                    @foreach ($vijestiKategorija as $row)
                    <option value="{{ $row->id }}" <?php if($row->id == $post->category_id) { echo "selected"; } ?>>{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Vijest (Bosanski): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="details_ba"> {!!$post->details_ba  !!} </textarea>
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Nova Slika </span></label>
                    <label class="custom-file">
                        <input type="file" id="file2" class="custom-file-input" name="post_image" onchange="readURL(this);" required="">
                        <span class="custom-file-control custom-file-control-primary"></span>
                        <img src="#" id="one" style="margin-top:5px;">
                    </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Stara Slika </span></label>
                    <label class="custom-file">
                    <img src="{{ URL::to($post->post_image) }}" style="height:80px; width:130px;">
                    <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                    </label>
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
        </div><!-- row -->
        <hr>


            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Dodaj</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>
    </div><!-- row -->


    <!-- ########## END: MAIN PANEL ########## -->
    
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

@endsection
