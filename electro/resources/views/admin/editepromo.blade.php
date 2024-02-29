@extends('admin_layout.master')
@section('titre')

    NL-electro modifier_promotion
    
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> modifier une promotion </h3>
                </div>
              <!-- /.card-header -->
             @if (count($errors)>0)
              <div class="alert alert-danger">
                <ul>
              @foreach ($errors->All() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
              </div>
              @endif
              @if (Session::has('status'))
                <br>
                <div class="alert alert-success"> {{Session::get('status')}}</div>
            @endif
              <!-- form start -->
            
                  
           
              <form  action="{{url('/admin/updatepromo/'.$promo->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre</label>
                        <input type="text"  value="{{$promo->titre}}" name="titre" class="form-control" id="exampleInputEmail1" required>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Prix du produit</label>
                      <input type="number"    value="{{$promo->price}}" name="price" class="form-control" id="exampleInputEmail1"  min="1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Prix promo</label>
                      <input type="number" value="{{$promo->promo_price}}"  name="promo_price" class="form-control" id="exampleInputEmail1"  min="1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">promo description 1</label>
                      <input type="text" value="{{$promo->description1}}" name="description1" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">promo description 2</label>
                    <input type="text"  value="{{$promo->description2}}" name="description2" class="form-control" id="exampleInputEmail1"  required>
                  </div>
                  <label for="exampleInputFile"> image 1</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file"   name="image1" class="custom-file-input" id="exampleInputFile" >
                     <label class="custom-file-label" for="exampleInputFile">choisir l'image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
                  </div>
                  <label for="exampleInputFile"> image 2</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file"   name="image2" class="custom-file-input" id="exampleInputFile" >
                     <label class="custom-file-label" for="exampleInputFile">choisir l'image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                  <input type="submit" class="btn btn-warning" value="Modifier" >
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
  </div>
  <!-- /.content-wrapper -->

@endsection