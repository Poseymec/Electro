@extends('client_layout.master')
@section('titre')

NL-electro_Store
	
@endsection
@section('contenu')
	<!-- BREADCRUMB -->
  {{--  <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li class="active">Headphones (227,490 Results)</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->--}}

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    
                    
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        @foreach ($categories as $categorie)
                        <div class="checkbox-filter">

                            <ul class="input-checkbox">
                              {{-- <input type="checkbox" id="category-1">--}}
                                <label for="category-1">
                                    <li style="list-style: circle;">
                                        <span></span>
                                        {{$categorie->category_name}}
                                        <small>({{$categorie->products_count}})</small>
                                    </li>
                                </label>
                            </ul>

                          
                        </div>
                        @endforeach
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                {{-- <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>--}}
                    <!-- /aside Widget -->

                   {{-- <!-- aside Widget -->
                   <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-2">
                                <label for="brand-2">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-3">
                                <label for="brand-3">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-4">
                                <label for="brand-4">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-5">
                                <label for="brand-5">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->--}}

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">meilleures ventes</h3>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                        <div class="products-widget-slick" data-nav="#slick-nav-1">
                            @php $productCount=0; @endphp
                            <div>
                            @foreach ($produits as $product)
                                @if($productCount <4)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('storage/product_cover/'.$product->cover)}}" alt="{{$product->cover}}">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$product->product_category}}</p>
                                        <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                                        <h4 class="product-price">{{$product->product_promo}}FCFA <del class="product-old-price">{{$product->product_price}}FCFA</del></h4>
                                    </div>
                                @php $productCount++ ; @endphp
                                </div>
                                @endif @if($productCount == 4)
                                    </div><div>
                                @php $productCount = 0; @endphp
                                @endif
                            @endforeach
                            </div>
                        </div>

                        {{--<div class="product-widget">
                            <div class="product-img">
                                <img src="./frontend/img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./frontend/img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>--}}
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach ($categories as $categorie)
                                <li  class="{{$categorie->id=='1'? 'active':''}}" ><a  data-toggle="tab" href="#tab{{$categorie->id}}">{{$categorie->category_name}}</a></li>
                            @endforeach  
                    </div>
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                          {{--  <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>--}}

                            <label>
                                Afficher:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                       {{--</div>
                            <ul class="store-grid">
                                <li class="active"><i class="fa fa-th"></i></li>
                                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            </div>--}}
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <div class="products-tabs">
                            @foreach ($categories as $categorie)
                            <!-- tab -->								
                            <div id="tab{{$categorie->id}}" class="tab-pane {{$categorie->id=='1'? 'active':''}}" >
                            @if ($categorie->products_count>0)
                                        @foreach ($categorie->products as $product)
                                      
                                     
                                        <div class="col-md-4 col-xs-6">
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
                                                <h4 class="product-price">{{$product->product_promo}}FCFA <del class="product-old-price">{{$product->product_price}}FCFA</del></h4>
                                                <div class="product-rating">
                                                 @if ($product->avis->isNotEmpty())  
                                            
                                                    
                                                @for ($i=1; $i<=5; $i++)
                                                                
                                                <i class="fa {{$i<=$product->avis->first()->max_rating? 'fa-star':'fa-star-o'}}"></i>
                                                @endfor 
                                                   
                                              
                                                @else
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    
                                                    @endif
                                                </div>
                                               <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a  href="{{url('/commandeproduit/'.$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Commander</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                
                                    {{$categorie->products->appends(['categorie'=>$categorie->id])->links()}}
                                    {{--$categorie->products()->paginate(6)->links()--}}
                                
                                    
                                 
                                    @endif
                                </div>
                                <!-- /tab -->
                                @endforeach
                            </div>
                        </div>
                        <!-- /store products -->
                        
                        <!-- store bottom filter -->
                   {{-- <div class="store-filter clearfix">
                            
                            @if ($categorie->products->lastPage()>1)
                            <ul class="store-pagination">
                                
                                @for ($i=1;$i<=$products->lastPage(); $i++)
                                
                                <li class="{{($products->currentPage()==$i)?'active':''}}"><a href="{{$products->url($i)}}">{{$i}}</a></li>
                                
                                @endfor
                                
                            </ul>
                            @endif
                        </div>--}}
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection    