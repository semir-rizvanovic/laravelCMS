@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Uredi Brend</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Uredi Brend</h6>
          <div class="table-wrapper">

          @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype ="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Brenda</label>
                    <input type="text" class="form-control" value="{{ $brand->brand_name }}" name="brand_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Novi Logo</label>
                    <input type="file" class="form-control" value="{{ $brand->brand_logo }}" name="brand_logo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stari Logo </label>
                    <p><img src="{{ URL::to($brand->brand_logo) }}" height="70px;" width="90px;"></p>
                    <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                </div>

                </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Uredi</button>
              </div>
              </form>   

          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->

@endsection