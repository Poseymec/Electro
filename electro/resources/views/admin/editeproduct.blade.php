@extends('admin_layout.master')
@section('titre')

    NL-electro_modifier_produit
    
@endsection
@section('contenu')

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produit</h1>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Modifier le Produit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if (Session::has('status'))
              <br>
              <div class="alert alert-success"> {{Session::get('status')}}</div>
              @endif

              
                    
            
              <form id="quickForm"  action="{{url('/admin/updateproduct/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom du produit</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$products->product_name}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prix du produit</label>
                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$products->product_price}}" min="1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prix promo</label>
                    <input type="number" name="product_promo" class="form-control" id="exampleInputEmail1" value="{{$products->product_promo}}" min="1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pourcentage de reduction</label>
                    <input type="number" name="product_reduction" class="form-control" id="exampleInputEmail1" value="{{$products->product_reduction}}" min="1" >
                  </div>
                  <div class="form-group" style="display:flex; flex-direction:column;">
                    <label for="exampleInputEmail1">Status du produit( si le prroduit est nouveau, cochez la case si non continuez)</label>
                    <input type="checkbox" name="product_brand" class="form-control" id="exampleInputEmail1" value="{{$products->product_brand}}"  style="aline-items:left; background:red;" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Description du produit</label>
                   <!-- <input type="text" name="product_description" class="form-control" id="exampleInputEmail1" placeholder="Enter slider description" required>-->
                    <textarea name="product_description" id="exampleInputEmail1" cols="30" rows="10" class="form-control"  required>{{$products->product_description}}</textarea>
                  <div class="form-group">
                    <label>Categorie</label>
                    
                    <select class="form-control select2" style="width: 100%;" name="product_category"  required>
                      <option selected="selected">{{$products->product_category}}</option>
                      @foreach ($categories as $category)
                      
                      <option>{{$category->category_name}}</option>
                    
                      @endforeach
                    </select>
                  </div>
                  <label for="exampleInputFile">image principale</label>
                  <div class="input-group">
                    <div class="custom-file">
                     <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                      <input type="file" class="custom-file-input" name="cover" id="exampleInputFile"  >
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
                  </div>
                   <label for="exampleInputFile"> images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                        <input type="file" class="custom-file-input" name="images[]" id="exampleInputFile" multiple  >
                      </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Télécharger</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                  <input type="submit" class="btn btn-success" value="Modifier">
                </div>
              </form>
           
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <input type="hidden" value="{{$increment=1}}">
                  <th> Numero</th>
                  <th>Image</th>
                  <th>Action</th>

                  
                
                </tr>
                </thead>
                <tbody>
                  @foreach ($productimages as $image)
                <tr>
                  <td>{{$increment}}</td>
                 
                  <td style="text-align:center;">
                      <img src="{{asset('storage/products_images/'.$image->images)}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                  </td>
                  <td style="text-align:center;"> 
                    <a href="{{url('/admin/deleteproductimage/'.$image->id)}}" id="delete" class="btn btn-danger"  style="display:inline-block;"><i class="nav-icon fas fa-trash"></i></a>
                  </td>
            </tr>
            <input type="hidden" {{$increment++}}>
            @endforeach
           
            </tbody>
            <tfoot>
            <tr>
              <th>Numero</th>
              <th>Images</th>
              <th>Action</th>
            
            </tr>
            </tfoot>
          </table>

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
