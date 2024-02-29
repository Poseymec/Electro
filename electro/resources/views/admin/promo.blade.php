@extends('admin_layout.master')
@section('titre')

    NL-electro promotions
    
@endsection
@section('contenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Promotion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Promotion</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Promotion</h3>
              </div>
              @if (Session::has('status'))
              <br>
              <div class="alert alert-success"> {{Session::get('status')}}</div>
           @endif
              <!-- /.card-header -->
              <input type="hidden" value="{{$increment=1}}">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Prix promo</th>
                    <th>Description1</th>
                    <th>Description2</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($promos as $promo)
                    
                    <tr>
                    <td>{{$increment}}</td>
                    <td>{{$promo->titre}}</td>
                    <td>{{$promo->price}}</td>
                    <td> {{$promo->promo_price}}</td>
                    <td>{{$promo->description1}}</td>
                    <td>{{$promo->description2}}</td>
                    <td>
                      <img src="{{asset('storage/promo_image/'.$promo->image1)}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>
                      <img src="{{asset('storage/promo_image/'.$promo->image2)}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>
                      @if ($promo->status==1)
                      <form action="{{url('/admin/unactivatepromo/'.$promo->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary"  > <i class="nav-icon fas fa-eye"></i></button>
                       {{--- <a href="#" class="btn btn-success">désactiver</a>--}}
                      </form>
                          
                      @else
                      <form action="{{url('/admin/activatepromo/'.$promo->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning" > <i class="nav-icon fas fa-eye-slash"></i></button>
                      
                      </form>
                     
                      @endif
                      <a href="{{url('/admin/editepromo/'.$promo->id)}}" class="btn btn-primary" style="display:inline-block;"><i class="nav-icon fas fa-edit"></i></a>

                      {{-- supprimer un promo--}}
                    {{-- <form action="{{url('/admin/deletepromo/'.$promo->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger" > <i class="nav-icon fas fa-trash"></i></button>
                      </form>--}}
                      <a href="{{url('/admin/deletepromo/'.$promo->id)}}" id="delete" class="btn btn-danger"  style="display:inline-block;"><i class="nav-icon fas fa-trash"></i></a>
                     {{-- <a href="#" class="btn btn-success">Désactiver</a>
                      <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>--}}
                      
                    </td>
                  </tr>
                  <input type="hidden" {{$increment++}}>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Numero</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Prix promo</th>
                    <th>Description1</th>
                    <th>Description2</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('style')

 <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
    
@endsection