@extends('admin_layout.master')
@section('titre')

    NL-electro_supprimer-produit
    
@endsection

@section('contenu')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Suppression</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Produit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="container " style="text-align: center">
      <div >
          <p class="alert alert-warning" style="background-color:red; color:white;">voulez vous vraiment supprimer cette image: <strong> {{$productimage->images}}</strong>?</p>
          <form action="{{url('/admin/yesdeleteproductimage/'.$productimage->id)}}" method="POST" style="display:inline-block;">
            @csrf
            @method("DELETE")
            <div class="form-actions"> 
              <button type="submit" class="btn btn-danger" > Oui</button>
            </div>
          </form>
          <a href="{{url('/admin/editeproduct')}}" class="btn btn-primary" >Non</a> 
        </div>
    </div>
</div>
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