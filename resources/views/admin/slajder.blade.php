@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slajder</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Lista Slajdera
          <a href="#" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Dodaj Slajder</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">Broj </th>
                  <th class="wd-10p">Naslov </th>
                  <th class="wd-15p">Opis </th>
                  <th class="wd-15p">Slika</th>
                  <th class="wd-5p"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($slajder as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{$row->naslov}} </td>
                  <td>{{$row->opis}} </td>
                  <td><img src="{{ URL::to($row->slika) }}" height="60px;" width="120px;"></td>
                  <td>
                    <a href="{{ URL::to('edit/slajder/'.$row->id) }}" class="btn btn-sm btn-info">Uredi</a>
                    <a href="{{ URL::to('delete/slajder/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Obriši</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Dodaj Slajder</h6>
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

              <form method="post" action="{{ route('store.slajder') }}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naslov </label>
                    <input type="text" class="form-control" placeholder="Unesi naziv" name="naslov">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Opis </label>
                    <input type="text" class="form-control" placeholder="Unesi opis" name="opis">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Slika (1920x700) </label>
                    <input type="file" class="form-control" placeholder="Slika Kategorije" name="slika">
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