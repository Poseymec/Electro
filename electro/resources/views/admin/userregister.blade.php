@extends('admin_layout.master')
@section('titre')

    NL-electro utilisateur
    
@endsection
@section('contenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilisateur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Utilisateur</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">tous les utilisateurs</h3>
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
                      <th>Nom</th>
                      <th>email </th>
                      <th>telephone</th>
                      <th>creation</th>
                      <th>roles</th>
                      <th>Action</th>
                      
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                      
                      <td>{{$increment}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->number}}</td>
                      <td>{{$user->created_at}}</td>
                      @if($user->roles->isNotEmpty())
                        @foreach ($user->roles as $role)
                        <td>{{$role->name}}</td>
                        @endforeach
                        @else
                        <td>simple utilisateur</td>
                        @endif
                        
                        <td> 
                          <a href="{{url('/admin/editeroleuser/'.$user->id)}}" class="btn btn-primary" style="display:inline-block;"><i class="nav-icon fas fa-edit"></i></a>
                          <a href="{{url('/admin/deleteuser/'.$user->id)}}" id="delete" class="btn btn-danger"  style="display:inline-block;"><i class="nav-icon fas fa-trash"></i></a></td>
                          
                        </tr>
                        <input type="hidden" {{$increment++}}>
                        @endforeach
                  </tbody>
                  <tfoot>
                  <tr>   
                    <th>Num</th>
                    <th>Nom</th>
                    <th>email </th>
                    <th>telephone</th>
                    <th>creation</th>
                    <th>roles</th>
                    <th>Action</th>
                 
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