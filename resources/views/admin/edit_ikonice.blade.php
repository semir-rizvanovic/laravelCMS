@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slajdovi</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Uredi Ikonicu</h6>
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

              <form method="post" action="{{ url('update/ikonice/'.$ikonice->id) }}" enctype ="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Opis</label>
                    <input type="text" class="form-control" value="{{ $ikonice->opis }}" name="opis">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nova Slika (60x70)</label>
                    <input type="file" class="form-control" value="{{ $ikonice->slika }}" name="slika">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stara Slika </label>
                    <p><img src="{{ URL::to($ikonice->slika) }}" height="60px;" width="70px;"></p>
                    <input type="hidden" name="old_image" value="{{ $ikonice->slika }}">
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