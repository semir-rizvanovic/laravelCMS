@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Kategorije</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Uredi kategoriju</h6>
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

              <form method="post" action="{{ url('update/category/'.$category->id) }}" enctype ="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Kategorije</label>
                    <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Opis Kategorije</label>
                    <input type="text" class="form-control" value="{{ $category->description }}" name="description">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nova Slika</label>
                    <input type="file" class="form-control" value="{{ $category->categoryImage }}" name="categoryImage">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stara Slika </label>
                    <p><img src="{{ URL::to($category->categoryImage) }}" height="120px;" width="100px;"></p>
                    <input type="hidden" name="old_image" value="{{ $category->categoryImage }}">
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