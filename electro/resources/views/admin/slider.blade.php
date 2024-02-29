@extends('admin_layout.master')
@section('titre')

    NL-electro slider
    
@endsection
@section('contenu')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sliders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Sliders</li>
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
                <h3 class="card-title">Tous les Sliders</h3>
              </div>
              @if (Session::has('status'))
              <br>
              <div class="alert alert-success"> {{Session::get('status')}}</div>
           @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero</th>
                    <th>Image</th>
                    <th>Description 1</th>
                    <th>Description 2</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" value="{{$increment=1}}">
                    @foreach ($sliders as $slider)
                        
              
                  <tr>
                    <td>{{$increment}}</td>
                    <td>
                      <img src="{{asset('storage/slider_images/'.$slider->image)}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>{{$slider->description1}} </td>
                    <td>{{$slider->description2}}</td>
                    <td style="text-align: center">
                      @if ($slider->status==1)
                      <form action="{{url('/admin/unactivateslider/'.$slider->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary"  > <i class="nav-icon fas fa-eye"></i></button>
                       {{--- <a href="#" class="btn btn-success">désactiver</a>--}}
                      </form>
                          
                      @else
                      <form action="{{url('/admin/activateslider/'.$slider->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning" > <i class="nav-icon fas fa-eye-slash"></i></button>
                      
                      </form>
                     
                      @endif
                      <a href="{{url('/admin/editeslider/'.$slider->id)}}" class="btn btn-primary" style="display:inline-block;"><i class="nav-icon fas fa-edit"></i></a>

                      {{-- supprimer un slider--}}
                     {{-- <form action="{{url('/admin/deleteslider/'.$slider->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger" > <i class="nav-icon fas fa-trash"></i></button>
                      </form>--}}
                    <a href="{{url('/admin/deleteslider/'.$slider->id)}}" id="delete" class="btn btn-danger" style="display:inline-block;" ><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <input type="hidden" {{$increment++}}>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Numero</th>
                    <th>Image</th>
                    <th>Description 1</th>
                    <th>Description 2</th>
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