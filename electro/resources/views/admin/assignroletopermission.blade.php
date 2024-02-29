@extends('admin_layout.master')
@section('titre')

    NL-electro assignations-role
    
@endsection
@section('contenu')

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assignation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Assignation</li>
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
    @if (Session::has('status'))
    <br>
    <div class="alert alert-success"> {{Session::get('status')}}</div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Assigner un role aux premissions</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
              <form id="quickForm"  action="{{url('/admin/saveassignment')}}" method="POST" enctype="multipart/form-data">
             
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label>Roles:</label>
                      <select class="form-control select2" style="width: 100%;" name="role"  required>
                        <option selected="selected">Choisir un role</option>
                        @foreach ($roles as $role)
                        <option>{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="">Permissions:</label>
                        @foreach ($permissions as $permission)
                        <div>
                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}">
                            <label for="">{{$permission->name}}</label>
                        </div> 
                        @endforeach

                    </div>
                 
                    
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                  <input type="submit" class="btn btn-success" value="Sauvegarder">
                  
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
  </div>
  <!-- /.content-wrapper -->

@endsection
