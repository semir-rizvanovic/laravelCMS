@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Kategorije</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Uredi kategoriju Vijesti</h6>
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

              <form method="post" action="{{ url('update/vijestiKategorije/'.$vijesti_category->id) }}">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Kategorije (Bosanski)</label>
                    <input type="text" class="form-control" value="{{ $vijesti_category->category_name_ba }}" name="category_name_ba">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Kategorije (Engelski)</label>
                    <input type="text" class="form-control" value="{{ $vijesti_category->category_name_en }}" name="category_name_en">
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