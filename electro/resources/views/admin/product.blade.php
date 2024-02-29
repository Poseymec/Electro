@extends('admin_layout.master')
@section('titre')

    NL-electro  produits
    
@endsection
@section('contenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produits</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Produits</li>
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
                <h3 class="card-title">Tous les Produits </h3>
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
                    <th>Image</th>
                    <th>Nom </th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>prix</th>
                    <th>promo</th>
                    <th>%</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $categorie)
                        
                    
                    @foreach ($categorie->products as $product)
                        
                  
                  <tr>
                    <td>{{$increment}}</td>
                    <td>
                        <img src="{{asset('storage/product_cover/'.$product->cover)}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_description}}</td>
                    <td>{{$product->product_category}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_promo}}</td>
                    <td>{{$product->product_reduction}}</td>
                    <td>{{$product->product_brand}}</td>
                    <td  style=" text-align:center">

                     {{--activé ou désactivé--------}}
                      @if ($product->status==1)   
                      <form action="{{url('/admin/unactivateproduct/'.$product->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary"  > <i class="nav-icon fas fa-eye"></i></button>
                      </form>
                      @else
                      <form action="{{url('/admin/activateproduct/'.$product->id)}}" method="POST"  style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning" > <i class="nav-icon fas fa-eye-slash"></i></button>
                      </form>
                      @endif

                          {{--modifier un produit--}}
                      
                      <a href="{{url('/admin/editeproduct/'.$product->id)}}" class="btn btn-primary" style="display:inline-block;"><i class="nav-icon fas fa-edit"></i></a>
                      {{--  supprimer un produit--}}
                      <a href="{{url('/admin/deleteproduct/'.$product->id)}}" id="delete" class="btn btn-danger"  style="display:inline-block;"><i class="nav-icon fas fa-trash"></i></a>
                      {{--<form action="{{url('/admin/deleteproduct/'.$product->id)}}" method="POST"  style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" > <i class="nav-icon fas fa-trash"></i></button>
                      </form>--}}
                    </td>
                  </tr>
                  <input type="hidden" {{$increment++}}>
                  @endforeach
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Num</th>
                    <th>Image</th>
                    <th>Nom </th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>prix</th>
                    <th> promo</th>
                    <th>%</th>
                    <th>status</th>
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