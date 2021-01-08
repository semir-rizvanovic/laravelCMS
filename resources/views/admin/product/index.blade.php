@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Proizvodi</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Lista Proizvoda
          <a href="{{ route('add.product') }}" class="btn btn-sm btn-success" style="float: right;" >Dodaj Proizvod</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">Šifra Proizvoda</th>
                  <th class="wd-15p">Naziv Proizvoda</th>
                  <th class="wd-15p">Slika</th>
                  <th class="wd-15p">Kategorija</th>
                  <th class="wd-15p">Brend</th>
                  <th class="wd-15p">Na stanju</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-5p"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>
                  <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->brand_name }}</td>
                  <td>{{ $row->product_quantity }}</td>
                  <td>
                  @if($row->status == 1) 
                      <span class="badge badge-success">Aktivan</span>
                      @else
                      <span class="badge badge-danger">Neaktivan</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info" title="Uredi Proizvod"><i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Obriši Proizvod"><i class="fa fa-trash"></i></a>
                    <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-warning" title="Pogledaj Proizvod"><i class="fa fa-eye"></i></a>
                   @if($row->status == 1)
                   <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="Promjeni u Neaktivan" ><i class="fa fa-thumbs-down"></i></a>
                   @else
                   <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-info" title="Promjeni u Aktivan" ><i class="fa fa-thumbs-up"></i></a>

                   @endif

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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Dodaj Brend</h6>
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

              <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="exampleInputEmail1">Naziv Brenda</label>
                    <input type="text" class="form-control" placeholder="Unesi naziv" name="brand_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Logo </label>
                    <input type="file" class="form-control" placeholder="Brend logo" name="brand_logo">
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