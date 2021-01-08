@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Kategorije Vijesti</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Lista kategorija Vijesti
          <a href="#" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Dodaj Kategoriju</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-25p">Naziv Kategorije (Bosanski)</th>
                  <th class="wd-25p">Naziv Kategorije (Engleski)</th>

                  <th class="wd-5p"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($kategorijeVijesti as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->category_name_ba }}</td>
                  <td>{{ $row->category_name_en }}</td>

                  <td>
                    <a href="{{ URL::to('edit/vijestiKategorije/'.$row->id) }}" class="btn btn-sm btn-info">Uredi</a>
                    <a href="{{ URL::to('delete/vijestiKategorije/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Obriši</a>
                  </td>
                </tr>
                @endforeach
 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



            <!-- LARGE MODAL -->
            <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Dodaj Kategoriju</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form method="post" action="{{ route('store.vijesti.kategorija') }}">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Kategorije (Bosanski)</label>
                    <input type="text" class="form-control" placeholder="Naziv na Bosanskom" name="category_name_ba">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Kategorije (Engleski)</label>
                    <input type="text" class="form-control" placeholder="Naziv na Engleskom" name="category_name_en">
                </div>


                </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Dodaj</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Zatvori</button>
              </div>
              </form>              
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection