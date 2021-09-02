<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('admin_master/img/logo/logo.png')}}" rel="icon">
	<title>Product Details</title>
    <script src="https://kit.fontawesome.com/c6033c6663.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Font DM Sans -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Mulish:ital,wght@1,200&display=swap" rel="stylesheet">
	<!-- Font Mulish -->
	<link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
	<!-- Font Arcivo -->
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_product.css') }}">

    <style>
        
    </style>

	
</head>
<body>
    <!-- Start Header Menu -->
    <div class="bg-white sticky-top shadow">
	<div class="container">
		<div id="navbar font-mulish text-fx-20">
			<nav class="navbar navbar-expand-lg navbar-light bg-white">
				<div class="container-fluid">
					<a class="navbar-brand" href="{{ route('page.home') }}"><img class="top-logo" src="{{ asset('default/logo/logo.png') }}"></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse middle_bar" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-1 mb-lg-0 text-center up-ul text-bold text-16-20 font-mulish">
							<li class="nav-item">
								<a class="nav-link " aria-current="page" href="{{ route('page.home') }}">Home</a>
							</li>
							<li class="nav-item dropdown">
								<span class="nav-link " >All Products</span>
                                <ul class="dropdown-content">
                                    @foreach($products as $p)
                                        <li ><a class="text-decoration-none width-100 text-16-20 logo-color" href="{{ route('page.product', $p->id) }}">{{ $p->product_name }}</a> </li>
                                    @endforeach
                                    
                                </ul>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#">Portfolio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#">Media</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#">Contact</a>
							</li>

						</ul>
						<div class="last-bar">
							<ul class="navbar-nav me-auto mb-1 mb-lg-0 text-center down-ul">
								<li class="nav-item">
									<a  href="" class="m-3 nav-link"><i class="fas fa-search"></i></a>
								</li>
								<li class="nav-item">
									<button class="hover-green btn bg-logo-color text-white size-sm text-bold text-16-18 font-mulish">Request A Quotation</button>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div> 
	</div>
    </div>
    <!-- End Header Menu -->

    <!-- start banner -->
    <div class="bg-image" style="background-image: url({{asset($product->product_banner->background_image)}});">
        <div class="bg-banner">
            <div class="container text-white  pt-sm-2 pt-md-3 pt-lg-5 ">
                <img  class="banner-logo" src="{{ asset($product->product_banner->product_icon) }}" alt="">
                
                <div class="row">
                    
                        
                    <div class="col-md-8 col-lg-7">
                        <h1 class="text-30-60 font-archivo text-bold">{{ $product->product_banner->banner_headline }}</h1>
                        <p class="text-12-20 font-mulish text-justify">{{ $product->product_banner->banner_text }}</p>
                    </div>
                </div>

                <div class="pt-1" >
                    
                </div>
                <div class="text-white  pt-md-1 pt-lg-2 ">
                    <a href="{{ $product->product_banner->button1_link }}"><button class="hover-green btn-p btn bg-logo-color border-radious-5 text-white text-12-16 text-bold font-mulish" style="border:1px solid rgb(136, 162, 9);">{{ $product->product_banner->button1_text }}</button> </a><span class="ps-2"></span>
                    <a href="{{ $product->product_banner->button2_link }}"><button class="btn-p btn btn-outline-light border-radious-5 text-12-16 text-bold font-mulish" >{{ $product->product_banner->button2_text }}</button></a>
                </div>
            </div>
            
        </div>


        
    </div>
    <!-- end banner -->
    
  
    <div class="container">
        <p class="text-muted font-mulish text-12-16"><span>Home </span><span>></span><span> Products</span><span>></span><span class="text-common text-bold" > {{ $product->product_name }}</span></p>
    </div>
    <br>


    <!-- End Banner -->

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="text-28-48 font-mulish text-bold">{{ $product->product_description->product_description_headline }}</h2>
                <p class="text-justify text-16-22 font-mulish" >
                    {{ $product->product_description->product_description_text }}
                </p>
                <div class="row text-16-22 font-mulish">
                    @foreach($product->product_description->product_description_point as $d_point)
                    <div class="col-md-6">
                        <div class="">
                            <span class="bord bg-light">
                                <i class="fas fa-check logo-color p-2"></i>
                            </span>
                            <span>{{ $d_point->point }}</span>
                        </div>
                    </div>


                    @endforeach
                   
                    
                </div>
            </div>
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-center pt-md-4 pt-sm-0 pe-sm-5">
                
                <video class="width-100 border-radious-15" controls>
                    <source src="{{ asset($product->product_description->product_description_video) }}" type="video/mp4">
                </video>    
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <a href="{{ $product->product_description->request_for_demo_button_link }}"><button class="btn hover-green bg-logo-color text-white  border-radious-5 btn-p  text-12-16 font-dm-sans">Request for Demo</button> </a>
                <span class="mx-2"></span>
                <a href="{{ $product->product_description->download_brochure_button_link }}"><button class="btn text-def-blue btn-outline-dark  border-radious-5 btn-p  text-12-16 font-dm-sans">Dowonload Brochure</button></a>
            </div>
        </div>
   
    </div>
    <br>
    <br>
    <div class="section-data footer-bg">
        <div class="container text-white p-2">
            <div class="row text-center p-4 font-mulish">
            @foreach($product->product_statistic as $statistic)
                <div class="col-md-4 text-center p-sm-3 p-md-0 ">
                    <div class="my-4">
                        <img class="height-px-70" src="{{ asset($statistic->statistic_icon) }}" alt="">
                        <h2 class="pt-3 pb-1 text-bold text-40-44 font-mulish" >{{ $statistic->statistic_number }}</h2>
                        <p class="text-fx-20">{{ $statistic->statistic_text }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="section-all-features">
        <div class="text-center">
            <small class="text-bold font-dm-sans ">ALL FEATURES</small>
            <h2 class="font-dm-sans text-bold text-24-36">{{ $product->product_all_feature->feature_headline }}</h2>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @php $j=0; @endphp
            @foreach ($product->product_all_feature->product_image as $p)
            @if($j==0)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $j }}" class="active dot" aria-current="true" aria-label="Slide {{ $j }}"></button>
            @else
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $j }}" class="dot " aria-label="Slide {{ $j }}"></button>
            @endif
            @php $j++; @endphp
            @endforeach
        </div>
        <div class="carousel-inner">
            @php $i=0; @endphp
            @foreach ($product->product_all_feature->product_image as $p)
            <div class="carousel-item mb-5  @if($i==0) active @endif ">
            <img src="{{ asset($p->product_photo) }}" class="d-block w-100" alt="b">
            </div>
            @php $i++; @endphp
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div id="carouselExampleIndicator1" class="carousel slide mx-0" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @php $j=0; $items=0; @endphp
            @foreach ($product->product_all_feature->product_feature as $pf)
                @php $j++; @endphp
            @endforeach

             @php $items=$j/4; @endphp 
          


            @php for($j=0; $j<$items; $j++){ @endphp
                @if($j==1)
                <button type="button" data-bs-target="#carouselExampleIndicator1" data-bs-slide-to="{{ $j }}" class="active dot" aria-current="true" aria-label="Slide {{ $j }}"></button>
                @else
                <button type="button" data-bs-target="#carouselExampleIndicator1" data-bs-slide-to="{{ $j }}" class="dot " aria-label="Slide {{ $j }}"></button>
                @endif
            @php } @endphp
                
        </div>
        <div class="container carousel-inner mb-5">
            
            @php  $c=0; $count = 1; $end=0; @endphp
            @foreach($product->product_all_feature->product_feature as $pf)
                @if($count%4 == 1)   
                    @if($count==1) <div class="carousel-item my-5 active mx-0"><div class="row">
                    @else <div class="carousel-item my-5 mx-0"><div class="row">
                    @endif
                    @php $end=1; @endphp
                @endif
                
                    <div class="col-md-6 mx-0 text-center p-2 py-2">
                        <div class="m-2  p-4 border border-radious-8 shadow-box">
                            <img class="product-logo" src="{{ asset($pf->feature_icon) }}" alt="">
                            <h4 class="pt-4 text-bold font-mulish text-20-30">{{ $pf->feature_headtext }}</h4>
                            <p class="px-3 font-mulish text-16-22">{{ $pf->feature_subtext }}</p>
                        </div>
                    </div>

                
                
                @php $count++; @endphp
                @if($count%4==1 )   @php $end=0; @endphp
                  </div>
                </div>
                @endif

             @endforeach
             @php 
                if($end == 1) echo "</div></div>"; 
             @endphp
        
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicator1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicator1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- <div class="container  mt-5">
        <div class="row text-center">

        @foreach($product->product_all_feature->product_feature as $pf)
            <div class="col-md-6 col-lg-6 p-2 px-3">
                <div class="  p-4 border border-radious-8 shadow-box">
                    <img class="product-logo" src="{{ asset($pf->feature_icon) }}" alt="">
                    <h4 class="pt-4 text-bold font-mulish text-20-30">{{ $pf->feature_headtext }}</h4>
                    <p class="px-3 font-mulish text-16-22">{{ $pf->feature_subtext }}</p>
                </div>
            </div>
        @endforeach
           
        </div>
    </div> -->

    <br>
    <div class="bg-soft-gray py-5">
        <div class="container">
            <div class="text-center">
                <small class="text-bold font-dm-sans">OUR STRENGTH</small>
                <h2 class="font-dm-sans text-bold text-24-36 pb-2">{{ $product->product_our_strength->strength_headline }}</h2>
            </div>
            <div class="row ">
                
                <div class="col-10 mx-auto">
                    <p class="font-mulish text-16-18 py-3 text-justify">{{ $product->product_our_strength->strength_text }}
                    </p>
                    <div class="row">
                        
                        @foreach($product->product_our_strength->product_strength as $ps)


                        <div class="col-md-12 col-lg-6 py-3">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <div class="bg-i1 p-3 logo-border mb-2" style="border-radius: 50%;">
                                        <img class="logo " src="{{ asset($ps->strength_icon) }}" alt="">
                                    </div>
                                    
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <h3 class="font-mulish text-fx-20 text-bold">{{ $ps->strength_headtext }}</h3>
                                    <p class="font-mulish text-fx-15 text-justify mt-3">{{ $ps->strength_subtext }}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach

                        
                    </div>
                </div>
     
            </div>
           
        
        </div>
    </div>


    <div class="package py-5">
        <div class="container">
            <div class="text-center pt-5">
                <small class="text-bold font-dm-sans ">PRICING PLAN</small>
                <h2 class="font-dm-sans text-bold text-24-36 pb-2">Choose Your Favorable Packages</h2>
            </div>
            <div class="text-end" >
                <button class="hover-black btn-p border-radious-8 text-fx-16 font-mulish text-semi-bold" style="border-color: 1px solid black;" >Custom Package</button>
            </div>
            <br>

            <div class="row pb-5">
                @foreach($product->product_package as $pp )

                <div class="col-md-6 col-lg-4 ">
                @if($pp->package_status == 1)
                    <div class="p-sm-3 p-md-0 p-lg-0 my-2"></div>
                    <div class="card2 shadow p-4  border-radious-8 font-mulish">
                @else
                    <div class="p-sm-0 p-md-1 p-lg-3 my-2"></div>
                    <div class="card1 p-4  border border-radious-8 font-mulish">
                @endif
                        <h3 class="text-center pt-2 text-bold text-20-24">{{ $pp->package_name }}</h3>
                        <div class="pac-content pt-3 text-muted text-fx-15">
                            @foreach($pp->product_package_point as $ppp)
                            <p><i class="fas fa-check-circle"></i> {{ $ppp->package_point }}</p>
                           
                            @endforeach
                        </div> 
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="container py-4">
        <div class="text-center pb-4">
            <small class="text-bold font-dm-sans text-uppercase ">Testimonials</small>
            <h2 class="font-dm-sans text-bold text-24-36">Our Respected Clients</h2>
        </div>

        <div class="row py-4">
        @foreach($product->product_testimonial as $pt)
            <div class="col-md-12 col-lg-4">
                <div class="border m-2 p-2 border-radious-8 ps-4 pe-3">
                    <div class="py-1 pb-4">
                        <img class="rounded-circle resp-client-img" src="{{ asset($pt->client_image) }}" alt="">
                    </div>
                    
                    <p class="font-mulish text-16-22">{{ $pt->client_comment }}
                    </p>
                    <h5 class="pt-2 text-bold font-mulish text-16-22">{{ $pt->client_name }}</h5>
                    <p class="text-muted font-mulish text-16-18">{{ $pt->client_designation }}</p>
                </div>
               
            </div>
        @endforeach
            
        </div>
        <div class="row pb-5 mt-5">
            <div class="text-center scroll-icons mt-1">
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-blue.png" alt=""></span>
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-gray2.png" alt=""></span>
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-gray2.png" alt=""></span>
            </div>
        </div>
        
    </div>

    

    <div class="container bg-world" style="background-image: url({{ URL::asset('default/background/world.png') }});">
    
        <div class="text-center py-4">
            <small class="text-bold font-dm-sans text-uppercase">OUR CLIENTS</small>
            <h2 class="font-dm-sans text-bold text-24-36">{{ $product->product_client->client_headline }}</h2>
        </div>

        <div class="row ">
        @foreach($product->product_client_image as $pc)
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="mr-client  mt-4 p-1 m-1 border border-radious-5">
                    <div class="mrc-logo text-center py-2">
                        <a href="{{ $pc->client_link }}"><img  class="mrc-image" src="{{ asset($pc->client_company_logo) }}" alt=""></a>
                    </div>
                </div>
            </div>

        @endforeach
        </div>

        <div class="row pb-4 mt-5">
            <div class="text-center scroll-icons mt-2">
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-blue.png" alt=""></span>
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-gray2.png" alt=""></span>
                <span><img class="s-ecllip" src="assets/images/product_page/slider/slider-gray2.png" alt=""></span>
            </div>
        </div>
    </div>

    <div class="bg-buy text-center" style="background-image: url({{ URL::asset('default/background/sell.png') }})">
        <div class=" bg-buy2 border-radious-8">
            <div class="row">
                <div class="col-md-7 text-start col-lg-6">
                    <h5 class="text-bold font-dm-sans text-26-40 ">{{ $product->product_buy->sell_headline }}</h5>
                    <p class="text-16-18 font-dm-sans">{{ $product->product_buy->sell_text }}</p>
                </div>
                <div class="col-md-5 text-center col-lg-6">
                    <button class="hover-buy px-3 py-2  buy-button text-white text-bold text-20-30 font-dm-sans border-radious-8">{{ $product->product_buy->sell_button_text }}</button>
                </div> 
            </div>
             
        </div>
       
    </div>



 


	
    <!-- Start Footer -->
    <div class="footer-bg text-light pt-4">
        <div class="container">
            <div class="row font-mulish">
                <div class="col-sm-8 col-md-6 col-lg-3">
                    <img class="footer-icon" src="{{ asset('default/logo/sdl_footer.png') }}" alt="">
                    <p class="pt-4 text-white text-justify text-16-18">
                        Systech Digital Limited. has earned vast popularity, having the focus on the Enterprise Application, Digital Content Development, Web Development and Mobile Application Development. SDL, in its 20 Years of Experience, has gathered stability with proven success
                    </p>
                </div> 
                <div class="col-sm-4 col-md-3 col-lg-2 pt-4">
                    <p class="text-bold text-16-22 footer-nav-link">Quick link</p>
                    <div class="pt-4 text-16-18 ">
                        <p><a href="" class="footer-nav-link">Gallery</a></p>
                        <p><a href="" class="footer-nav-link">About Us</a></p>
                        <p><a href="" class="footer-nav-link">Contract</a></p>
                        <p><a href="" class="footer-nav-link">Purchase Guide</a></p>
                        <p><a href="" class="footer-nav-link">Terms of Service</a></p>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-2 pt-4">
                    <p class="text-bold text-16-22 footer-nav-link">About Us</p>
                    <div class="pt-4 text-16-18 ">
                        <p><a href="" class="footer-nav-link">Customers</a></p>
                        <p><a href="" class="footer-nav-link">Careers</a></p>
                        <p><a href="" class="footer-nav-link">Resources</a></p>
                        <p><a href="" class="footer-nav-link">Leadership</a></p>
                        <p><a href="" class="footer-nav-link">News & Events</a></p>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-2  pt-4">
                    <p class="text-bold text-16-22 footer-nav-link">Services</p>
                    <div class="pt-4 text-16-18 ">
                        <p><a href="" class="footer-nav-link">Talent Acquisition</a></p>
                        <p><a href="" class="footer-nav-link">Time Management</a></p>
                        <p><a href="" class="footer-nav-link">Payroll</a></p>
                        <p><a href="" class="footer-nav-link">Talent Management</a></p>
                        <p><a href="" class="footer-nav-link">All Services</a></p>
                    </div>
                </div>

                <div class="col-sm-5 col-md-6 col-lg-3 pt-4">
                    <p class="text-bold text-16-22">Contact Us</p>
                    <div class="text-16-18">
                        <p><i class="far fa-envelope"></i> sales@Systechdigital.com</p>
                        <p><i class="fas fa-phone-alt"></i> +88-01750023486</p>
                        <p><i class="fas fa-phone-alt"></i> +88-01750023487</p>
                        <h5 class="text-bold">Call for Support</h5>
                        <p><i class="far fa-envelope"></i> support@systechdigital.com</p>
                        <p><i class="fas fa-phone-alt"></i> (HOT LINE) +88-01844527180</p>
                    </div>
                </div>

            </div>
            <br>
        </div>
        <hr>
        <div class="container pt-2 font-mulish text-16-18">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5 text-center pb-2">
                    <p>© 2001-2021 All Rights Reserved  Systech Digital Ltd.</p>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 pb-2">
                    <div class="footer-nav  text-center">
                        <a href="" class="footer-nav-link">Home</a>
                        <a href="" class="footer-nav-link">Blog</a>
                        <a href="" class="footer-nav-link">Career</a>
                        <a href="" class="footer-nav-link">Contact</a>
                        <a href="" class="footer-nav-link">Sales</a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-2 pb-2">
                    <div class="footer-nav  text-center">
                        <a href="" class="footer-nav-link"><i class="fab fa-facebook"></i></a>
                        <a href="" class="footer-nav-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="" class="footer-nav-link"><i class="fab fa-twitter"></i></a>
                        <a href="" class="footer-nav-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    <!-- End Foooter -->

    <!-- Scripts -->
 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>