@extends('client_layout.master')

@section('titre')

NL-electro_Produit
	
@endsection
@section('contenu')

	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{url('/')}}">Accueil</a></li>
                        <li><a href="{{url('/store')}}">Boutique</a></li>
                        <li>{{$product->product_category}}</li>
                      
                        <li class="active">{{$product->product_name}}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
          
            <div class="row">
                <!-- Product main img -->
                
                
                
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach ($product->product_images as $image)
                        <div class="product-preview">
                            <img src="{{asset('storage/products_images/'.$image->images)}}" alt="$image->images">
                        </div>
                        @endforeach
                      
                      {{--<div class="product-preview">
                            <img src="./frontend/img/product03.png" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="./frontend/img/product06.png" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="./frontend/img/product08.png" alt="">
                        </div>--}}
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
              
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($product->product_images as $image)
                        <div class="product-preview">
                            <img src="{{asset('storage/products_images/'.$image->images)}}" alt="$image->images">
                        </div>
                        @endforeach

                     {{--<div class="product-preview">
                            <img src="./frontend/img/product03.png" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="./frontend/img/product06.png" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="./frontend/img/product08.png" alt="">
                        </div>--}}
                    </div>
                </div>
             
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$product->product_name}}</h2>
                        <div>
                            @if ($product->avis->isNotEmpty()) 
                                @for ($i=1; $i<=5; $i++)
                                <i @style('color:red') class="fa {{$i<=$higthRating? 'fa-star':'fa-star-o'}}"></i>
                                @endfor 
                            @else
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i> 
                            @endif
                            <a class="review-link" href="#">  Avis | Ajoutez votre Avis</a>
                        </div>
                        <div>
                            <h3 class="product-price"> {{$product->product_promo}}FCFA <del class="product-old-price">{{$product->product_price}}FCFA</del></h3>
                            <span class="product-available">En stock</span>
                        </div>
                        <p>{{$product->product_description}}</p>

                        <div class="product-options">
                           {{-- <label>
                                Size
                                <select class="input-select">
                                    <option value="0">X</option>
                                </select>
                            </label>
                            <label>
                                Color
                                <select class="input-select">
                                    <option value="0">Red</option>
                                </select>
                            </label>--}}
                        </div>

                        <div class="add-to-cart">
                           {{-- <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>--}}
                          
                            <a  href="{{url('/commandeproduit/'.$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Commander</button></a>
                        </div>

                       {{-- <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>--}}

                        <ul class="product-links">
                            <li>Categorie:</li>
                          
                            <li><a href="{{url('/store')}}">{{$product->product_category}}</a></li>

                        <ul class="product-links">
                            <li>Partager:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                    
                </div>
                <!-- /Product details -->
                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                           {{--<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>--}} 
                            <li><a data-toggle="tab" href="#tab3">Avis (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                       <div class="tab-content">
                            <!-- tab1  -->
                           {{--  <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->--}}

                            <!-- tab3  -->
                              {{--<div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                              <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                    <span>4.5</span>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                            </div>
                                            <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 80%;"></div>
                                                        </div>
                                                        <span class="sum">3</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 60%;"></div>
                                                        </div>
                                                        <span class="sum">2</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>--}}
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    
                                    
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach ($productAvis1 as $avi)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{$avi->nameAvis}}</h5>
                                                        <p class="date">{{$avi->created_at}}</p>
                                                        <div class="review-rating">
                                                            @for ($i=1; $i<=5; $i++)
                                                                
                                                            <i class="fa {{$i<=$avi->rating? 'fa-star':'fa-star-o'}}"></i>
                                                            @endfor
                                                           {{-- <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>--}}
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$avi->avis}}</p>
                                                    </div>
                                                </li>
                                               {{-- <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                    </div>
                                                </li>--}}
                                                @endforeach
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form" >
                                            <form action="{{url('/client/saveAvis')}}"  method="POST" class="review-form">
                                                @csrf

                                                <input class="input" type="text" placeholder="Votre Nom" name="nameAvis">
                                                <input class="input" type="email" placeholder="votre Email" name="emailAvis">
                                                <input class="input" type="hidden"  name="productName" value="{{$product->product_name}}">
                                                <input class="input" type="hidden" name="product_id" value="{{$product->id}}">
                                                <textarea class="input" placeholder="Votre Avis" name="avis"></textarea>
                                                <div class="input-rating">
                                                    <span>Votre note: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Soumettre</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
        
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Produits associés</h3>
                    </div>
                </div>
                
             			<!-- product -->
                        
                          
                                @foreach ($selectCategories as $product)
                             
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
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->
    
@endsection