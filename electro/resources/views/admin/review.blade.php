@extends('admin_layout.master')
@section('titre')

    NL-electro avis
    
@endsection
@section('contenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Avis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Avis</li>
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
                <h3 class="card-title">tous les Avis</h3>
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
                      <th>Num</th>
                      <th>Nom du produit</th>
                      <th>Email utilisateur </th>
                      <th>Nom utilisateur </th>
                      <th>Avis</th>
                      <th>Etoiles</th>
                      <th>Actions</th>
                      
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($avis as $avi)
                    <tr>
                    
                        <td>{{$increment}}</td>
                        <td>{{$avi->productName}}</td>
                        <td>{{$avi->emailAvis}}</td>
                        <td>{{$avi->nameAvis}}</td>
                        <td>{{$avi->avis}}</td>
                        <td>{{$avi->rating}}</td>
                        <td  style=" text-align:center">
                        @if ($avi->status==1)   
                        <form action="{{url('/admin/activateAvi/'.$avi->id)}}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-primary"  > <i class="nav-icon fas fa-eye"></i></button>
                        </form>
                        @else
                        <form action="{{url('/admin/unactivateAvi/'.$avi->id)}}" method="POST"  style="display:inline-block;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-warning" > <i class="nav-icon fas fa-eye-slash"></i></button>
                        </form>
                        @endif
                        <form action="{{url('/admin/deleteAvi/'.$avi->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger" > <i class="nav-icon fas fa-trash"></i></button>
                      </form>
                        </td>
                       
                       
                    </tr>
                    <input type="hidden" {{$increment++}}>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>   
                    <th>Num</th>
                    <th>Nom du produit</th>
                    <th>Email utilisateur </th>
                    <th>Nom utilisateur </th>
                    <th>Avis</th>
                    <th>Etoiles</th>
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