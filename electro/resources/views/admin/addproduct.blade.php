@extends('admin_layout.master')
@section('titre')

    NL-electro ajouter_un_produits
    
@endsection
@section('contenu')

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter un Produit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
              <form id="quickForm"  action="{{url('/admin/saveproduct')}}" method="POST" enctype="multipart/form-data">
             
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom du produit</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Entrez le  nom du produit" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prix du produit</label>
                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Entrez le prix du produit" min="1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prix promotionnel</label>
                    <input type="number" name="product_promo" class="form-control" id="exampleInputEmail1" placeholder="Entrez le prix promotionnel du produit" min="1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pourcentage de reduction</label>
                    <input type="number" name="product_reduction" class="form-control" id="exampleInputEmail1" placeholder="Entrez le pourcentage de reduction du prodduit" min="1"  >
                  </div>
                  <div class="form-group" style="display:flex; flex-direction:column;">
                    <label for="exampleInputEmail1">Status du produit( si le produit est nouveau, cochez la case si non continuez)</label>
                    <input type="checkbox" name="product_brand" class="form-control" id="exampleInputEmail1"  style="aline-items:left; background:red;" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Description du produit</label>
                    <textarea name="product_description" id="exampleInputEmail1" cols="30" rows="10" class="form-control"  placeholder="Entrez  la descriptiondu produit " required></textarea>
                  <div class="form-group">
                      <label>Categorie</label>
                      <select class="form-control select2" style="width: 100%;" name="product_category"  required>
                        <option selected="selected">Choisir une Categorie</option>
                        @foreach ($categories as $category)
                        <option>{{$category->category_name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <!-- <input type="text" name="product_description" class="form-control" id="exampleInputEmail1" placeholder="Enter slider description" required>-->
                   
                    <label for="exampleInputFile">Image principale</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <label class="custom-file-label" for="exampleInputFile">choisir le fichier</label>
                      <input type="file" class="custom-file-input" name="cover" id="exampleInputFile" required >
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
                  </div>
                  <label for="exampleInputFile"> images Secondaires</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <label class="custom-file-label" for="exampleInputFile">choisir le fichier</label>
                      <input type="file" class="custom-file-input" name="images[]" id="exampleInputFile" multiple  required >
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
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
