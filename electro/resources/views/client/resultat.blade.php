@extends('client_layout.master')

@section('titre')

NL-electro_recherche
	
@endsection
@section('contenu')





<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @if($resultatProduct->isEmpty())
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h1 class="title">aucun resultat trouvé</h1>
                    </div>
                </div>
                   
            @else

         
           
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h1 class="title">RESULTAT DE LA RECHERCHE</h1>
                </div>
            </div>
            
                     <!-- product -->
                   
                      
                            @foreach ($resultatProduct as $product)
                         
                            <div class="col-md-3 col-xs-6">
                                <div class="product">
                                    <a  href="{{url('/productdetail/'.$product->id)}}">
                                        <div class="product-img">
                                        <img src="{{asset('storage/product_cover/'.$product->cover)}}" alt="{{$product->cover}}">
                                        <div class="product-label">
                                            <span class="sale">-{{$product->product_reduction}}%</span>
                                            <span class="new">{{$product->product_brand}}</span>
                                        </div>
                                    
                                    </div>
                                    </a>
                                    <div class="product-body">
                                        <p class="product-category">{{$product->product_category}}</p>
                                        <h3 class="product-name"><a href="{{url('/productdetail/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                        <h4 class="product-price">{{$product->product_promo}}<del class="product-old-price">{{$product->product_price}}</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <!--<div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>-->
                                    </div>
                                    <div class="add-to-cart">
                                        <a  href="{{url('/commandeproduit/'.$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Commander</button></a>
                                    </div>
                                </div>
                        
                         
                        </div>
                        @endforeach
                 
                 
         
            <!-- /product -->
           
        </div>
        
        
        @endif
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->





@endsection