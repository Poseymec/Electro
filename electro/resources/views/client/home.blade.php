@extends('client_layout.master')

@section('titre')

NL-electro_Accueil
	
@endsection
@section('contenu')
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
                    @foreach ($sliders as $slider)
                        
                   
					<div class="col-md-3 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('storage/slider_images/'.$slider->image)}}" alt="{{$slider->image}}">
							</div>
							<div class="shop-body">
								<h5 style="color: white;">{{$slider->description1}}</h5>
                                <p  style="color: white;">{{$slider->description2}}</p>
								<a href="#" class="cta-btn"Voir plus <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    @endforeach
					<!-- /shop -->

					<!-- shop -->
					{{--<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessoires<br>Collection</h3>
								<a href="#" class="cta-btn">Acheter maintenant <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="#" class="cta-btn">Acheter maintenant <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>--}}
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
			<!-- SECTION -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
	
						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<h3 class="title">Produits</h3>
								<div class="section-nav">
									<ul class="section-tab-nav tab-nav">
										@foreach ($categories as $categorie)
											<li  class="{{$categorie->id=='1'? 'active':''}}" ><a  data-toggle="tab" href="#tab{{$categorie->id}}">{{$categorie->category_name}}</a></li>
											@endforeach
											{{--<li><a data-toggle="tab" href="#tab1">Appareils Electroniques</a></li>
											<li><a data-toggle="tab" href="#tab1">Accessoires</a></li>--}}
										</ul>
									</div>
							</div>
						</div>
						<!-- /section title -->
	
						<!-- Products tab & slick -->
						<div class="col-md-12">
							<div class="row">
								<div class="products-tabs">
								
									@foreach ($categories as $categorie)
									<!-- tab -->								
									<div id="tab{{$categorie->id}}" class="tab-pane {{$categorie->id=='1'? ' active':''}}" >

										
										<!-- product -->
										<div  class="products-slick" data-nav="#slick-nav-{{$categorie->id}}">
											@foreach ($categorie->products as $product)

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
											@endforeach
										</div>
										<div id="slick-nav-{{$categorie->id}}" class="products-slick-nav"></div>
									
									</div>
									<!-- /tab -->
									@endforeach
								</div>
							</div>
						</div>
						<!-- Products tab & slick -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Acheter maintenant</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		{{--<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">meilleures ventes</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Ordinateurs</a></li>
									<li><a data-toggle="tab" href="#tab1">Telephones</a></li>
									<li><a data-toggle="tab" href="#tab1">Appareils Electroniques</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessoires</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->--}}

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@foreach ($categories as $categorie)
					<div class="col-md-3 col-xs-6">
						<div class="section-title">
							<h4 class="title">mieux vendu</h4>
							<div class="section-nav">
								<div id="slick-nav-0{{$categorie->id}}" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-0{{$categorie->id}}">
							@php $productCount=0; @endphp
							<div>
							@foreach ($categorie->products as $product)
								@if ($productCount < 3)
							<!-- product widget -->
								<div class="product-widget">
									<a  href="{{url('/productdetail/'.$product->id)}}"><div class="product-img">
										<img src="{{asset('storage/product_cover/'.$product->cover)}}" alt="">
									</div></a>
									<div class="product-body">
										<p class="product-category">{{$product->product_category}}</p> 
										<h3 class="product-name"><a href="{{url('/productdetail/'.$product->id)}}">{{$product->product_name}}</a></h3>
										<h4 class="product-price">{{$product->product_promo}}FCFA <del class="product-old-price">{{$product->product_price}}FCFA</del></h4>
									</div>
								</div>
								@php $productCount ++ ; @endphp
								@endif @if($productCount == 3)
									</div><div>
								@php $productCount = 0; @endphp
								@endif
							@endforeach	
							</div>
						</div>			
					</div>
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		{{-- script qui gere le message de bienvenue--}}
	
    
@endsection