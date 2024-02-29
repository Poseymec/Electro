@extends('admin_layout.master')
@section('titre')

    NL-electro Ajouter_une_permission
    
@endsection
@section('contenu')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Permission</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (Session('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
      
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter une permission</small></h3>
              </div>
              @if (Session::has('status'))
                  <br>
              <div class="alert alert-success"> {{Session::get('status')}}</div>
              @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin/createpermission')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom de la permission</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Entrez le Nom de la permission"  required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <input type="submit" class="btn btn-primary" value="Sauvegarder" >
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Toutes les permissionss</h3>
              </div>
              <!-- /.card-header -->
              @if (Session::has('status'))
                <br>
                <div class="alert alert-success"> {{Session::get('status')}}</div>
             @endif
              <input type="hidden" {{$increment=1}}>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Num.</th>
                      <th>Permission</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($permissions as $permission)
                  <tr>
                      <td>{{$increment}}</td>
                      <td>{{$permission->name}}</td>
                      <td style="text-align: center">
                        
                        <a href="{{url('admin/editepermission/'.$permission->id)}}" class="btn btn-primary" style="display:inline-block;"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="{{url('/admin/deletepermission/'.$permission->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                        {{--<form action="{{url('admin/deletecategory/'.$category->id)}}" method="POST" style="display:inline-block;">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-danger"  > <i class="nav-icon fas fa-trash"></i></button>
  
                        </form> --}}
  
                      </td>
                    </tr>
                    <input type="hidden" {{$increment++}}>
                    @endforeach
              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Num.</th>
                    <th>Permission</th>
                
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
