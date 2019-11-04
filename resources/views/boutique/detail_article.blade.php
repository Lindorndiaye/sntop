@extends('site')

@section('title')
Ma Boutique {{$boutique->nom}} - Sn-TopAuto.com 
@endsection

@section('css')
<link href="{{ asset('css/article.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/flexslider.css')}}" type="text/css">
@endsection

@section('content')
    <!-- FlexSlider -->
    <script defer src="{{ url('js/jquery.flexslider.js')}}"></script>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider -->
    <div class="product-desc">
				<div class="col-md-7 product-view">
					<h2>{{$article->titre}}</h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Added at 06:55 pm, Ad ID: 987654321</p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{ asset('images/boutique/articles/'.$article->photo)}}">
								<img src="{{ asset('images/boutique/articles/'.$article->photo)}}" />
							</li>
							<li data-thumb="images/ss2.jpg">
								<img src="images/ss2.jpg" />
							</li>
							<li data-thumb="images/ss3.jpg">
								<img src="images/ss3.jpg" />
							</li>
							<li data-thumb="images/ss4.jpg">
								<img src="images/ss4.jpg" />
							</li>
						</ul>
					</div>
					
					<div class="product-details">
						<h4><span class="w3layouts-agileinfo">Brand </span> : <a href="#">Company name</a><div class="clearfix"></div></h4>
						<h4><span class="w3layouts-agileinfo">Views </span> : <strong>150</strong></h4>
						<h4><span class="w3layouts-agileinfo">Fuel </span> : Petrol</h4>
						<h4>
                            <span class="w3layouts-agileinfo">Description</span> :
                            <p>{{$article->description}}</p>
                            <div class="clearfix"></div>
                        </h4>
					
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h3 class="rate">$ 45999</h3>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Condition</p>
							<h4>Good</h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h4>Cars</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i>00-85-9875462655</p>
					</div>
						<div class="tips">
						<h4>Safety Tips for Buyers</h4>
							<ol>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
							</ol>
						</div>
				</div>
				<div class="clearfix"></div>
			</div>
@endsection