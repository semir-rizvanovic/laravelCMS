@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Vijesti</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Lista Vijesti
          <a href="{{ route('add.news') }}" class="btn btn-sm btn-success" style="float: right;">Dodaj Vijest</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Naslov </th>
                  <th class="wd-15p">Datum</th>
                  <th class="wd-15p">Kategorija </th>
                  <th class="wd-15p">Slika</th>
                  <th class="wd-5p"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($post as $row)
                <tr>
                  <td>{{ $row->post_title_ba }}</td>
                  <td>{{ $row->datum }}</td>
                  <td>{{ $row->category_name_ba }}</td>
                  <td><img src="{{ URL::to($row->post_image) }}" style="height:50px; width:50px;"></td>


                  <td>
                    <a href="{{ URL::to('edit/news/'.$row->id) }}" class="btn btn-sm btn-info">Uredi</a>
                    <a href="{{ URL::to('delete/news/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Obriši</a>
                  </td>
                </tr>
                @endforeach
 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection