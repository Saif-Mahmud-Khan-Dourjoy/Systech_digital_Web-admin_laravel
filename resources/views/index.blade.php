 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Home</title>

 	<script src="https://kit.fontawesome.com/c6033c6663.js" crossorigin="anonymous"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<!-- Font DM Sans -->
 	<link rel="preconnect" href="https://fonts.gstatic.com">
 	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Mulish:ital,wght@1,200&display=swap" rel="stylesheet">
 	<!-- Font Mulish -->
 	<link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
 	<!-- Font Arcivo -->
 	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">


	<!-- <link rel="stylesheet" type="text/css" href="assets/css/boostrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/boostrap/all.min.css"> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/css/custom_style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/custom_home.css">






	</head>
	<body>
		<div class="bg-white sticky-top shadow">
			<div class="container">
				<div id="navbar">
					<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
						<div class="container-fluid">
							<a class="navbar-brand" href="{{ route('page.index') }}"><img class="logo" src="assets/images/logo/logo.png"></a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse middle_bar" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center up-ul">
									<li class="nav-item">
										<a class="nav-link active text-bold text-16" aria-current="page" href="{{ route('page.index') }}">Home</a>
									</li>
									<li class="nav-item dropdown">
										<span class="nav-link text-bold text-16" >All Products</span>
										<ul class="dropdown-content">
											@php 
											$products = App\Product::all();
											@endphp
											@foreach($products as $p)
											<li ><a class="text-decoration-none width-100 text-16-20" href="{{ route('page.product', $p->id) }}">{{ $p->product_name }}</a> </li>
											@endforeach

										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link text-bold text-16" href="#">Services</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-bold text-16" href="#">Portfolio</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-bold text-16" href="#">Media</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-bold text-16" href="#">Contact</a>
									</li>

								</ul>
								<div class="last-bar">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center down-ul">
										<li class="nav-item">
											<a  href="" class="m-3 nav-link"><i class="fas fa-search"></i></a>
										</li>
										<li class="nav-item">
											<button class="btn nav-button-clr border-none p-2 px-3text-16 ">Request a Quotation</button>
										</li>

									</ul>
								</div>
							</div>
						</div>
					</nav>
				</div> 
			</div>
		</div>



		<div class="bg-image" style="background-image: url(assets/images/banner/b1.png);">
			<div class="bg-banner">	
				<div class="container">
					<div class="banner-content p-4">
						<div class="row banner-text" >
							<div class="col-md-12  pt-5">
								<h1 class="font-archivo text-bold " >The Leading Software <br>Company In Bangladesh </h1>
								<p  class="text-justify font-mulish text-medium-bold "> 
									Experience, ingenuity and unparalleled strength in client communication and project management have enabled SDL, with the ability and reputation for guaranteed performance.	
								</p>
							</div>

						</div>
						<div>
							<button class="btn-green-color text-white border-none btn-space px-4 font-mulish text-bold text-12 ">Learn More</button>
							<button class="btn-trans-color px-4 text-white border-none font-mulish text-bold text-12">Get Connected</button>
						</div>
					</div>
				</div>


			</div>

		</div>


		<!-- Start Container -->
		<div class="container">
			<div class="mt-5">
				<div class="row  font-mulish">
					@php
					$statistic=App\HomeStatistic::all();
					@endphp
					@foreach($statistic as $sts)
					<div class="col-lg-3 col-md-6 col-sm-12 text-center">
						<div class="">
							<img src="{{asset($sts->icon)}}" class="p-4" style="width:30%; filter: invert(54%) sepia(59%) saturate(2209%) hue-rotate(38deg) brightness(98%) contrast(93%);">
						</div>
						<h2 class="project-number text-45  mt-2 font-archivo text-bold text-capitalize  ">{{$sts->statistic_number}}</h2>
						<p class="project-text text-18  text-muted font-mulish text-medium-bold text-capitalize">{{$sts->statistic_text}}</p>  
					</div>
					@endforeach	

				</div>
			</div>


			<div class="margin-cus-top p-4">
				<div class="container text-center mb-3">
					<small class="text-bold font-dm-sans">ABOUT COMPANY</small>
					<h4 class=" why-text text-26 font-dm-sans text-bold">Why Systech Digital Limited</h4>
				</div>

				<div class="row p-4 shadow margin-cus-top ">
					@php
					$aboutCompany=App\AboutCompany::first();

					@endphp
					@isset($aboutCompany)
					<div class="col-md-6 d-flex justify-content-center align-items-center" >
						<div class="">
							<div class="">


								<video controls class="whysys-img">
									<source src="{{asset($aboutCompany->video)}}" >

									</video>

								</div>
							</div>


						</div>
						<div class="col-md-6 mt-3 text-center">
							<h3 class="why-text-2 text-22 font-mulish text-bold text-start">{{$aboutCompany->headline}}</h3>
							<p class="text-16 font-mulish text-justify text-muted mt-4"> 
								{{$aboutCompany->description}} <a class="logo-color" href="">Learn More</a>
							</p>
							@foreach($aboutCompany->company_sub_section as $c_s_s)
							<div class="row mt-4">
								<div class="col-3 text-end">
									<img class="width-50" src="{{asset($c_s_s->icon)}}" alt="">
								</div>
								<div class="col-9">
									<h4 class="text-16 font-dm-sans text-bold text-start">{{$c_s_s->head_text}}</h4>
									<p class="text-14 font-mulish  text-justify text-muted">{{$c_s_s->sub_text}}</p>
								</div>
							</div>
							@endforeach



							<div class="row mt-4 ">
								<div class="col-4 text-end ">
									<img class="width-80" src="{{asset($aboutCompany->company_head->signature)}}" alt="">
								</div>
								<div class="col-2 text-center ">
									<div class="vl">

									</div>
								</div>

								<div class="col-5 text-start ">
									<h4 class="text-16 font-dm-sans text-bold">{{$aboutCompany->company_head->name}}</h4>
									<p class="text-14 font-mulish text-muted">{{$aboutCompany->company_head->designation}}</p>
								</div>
							</div>

						</div>

						@endisset

					</div>

				</div>
			</div>
			<!-- End Container -->
		</div>

		<div class="features bg-light p-4 margin-cus-top ">
			<!-- Start Container -->
			<div class="container ">
				<div class="row text-center pt-4">
					<small class="text-bold font-dm-sans">SERVICES FEATURES</small>
					<h4 class=" sf-text font-dm-sans text-bold text-26">Ultimate Features That Works</h4>
				</div>
				@php
				$serviceFeature=App\ServiceFeature::all();
				$i=0;
				@endphp
				<div class="row pt-4 margin-cus-top2">

					@foreach($serviceFeature as $s_f)	
					<div class="col-sm-12 col-md-6 col-lg-4 mb-5">
						<div class="row">
							<div class="col-3 text-end">
								<img class="width-90 icon-image" src="{{asset($s_f->icon)}}" alt="">
							</div>
							<div class="col-9">
								<h4 class="text-16  font-dm-sans text-bold">{{$s_f->head_text}} @if($i==4) <span class="latest-top"><button class="latest text-8 font-dm-sans text-medium-bold">Latest</button></span> @endif </h4>
								<p class="text-15 font-dm-sans text-justify text-muted">{{$s_f->sub_text}}</p>
							</div>
						</div>
					</div>
					@php

					$i++;

					@endphp
					@endforeach	
				</div>
			</div>


			<!-- End Container -->


		</div>


		<div class="bg-light-rad p-4 margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans">PRODUCT FEATURES</small>

					<h4 class=" pf-text text-26 font-dm-sans text-bold">Ultimate Features That Works</h4>
				</div>
				<div class="row pt-4 margin-cus-top2">
					@php
					$productFeature=App\HomeProductFeature::all();
					$i=0;
					@endphp
					@foreach($productFeature as $p_f)
					<div class="col-sm-12 col-md-6 col-lg-4 mb-5">
						<div class="row">
							<div class="col-3 text-end">
								<img class="width-90 icon-image" src="{{asset($p_f->icon)}}" alt="">
							</div>
							<div class="col-8">
								<h4 class="text-16 font-dm-sans text-bold">{{$p_f->head_text}} @if($i==0) <span class="latest-top"><button class="latest text-8 font-dm-sans text-medium-bold">Latest</button></span> @endif</h4> 
								<p class="text-15 font-dm-sans text-justify text-muted">{{$p_f->sub_text}}</p>
							</div>
						</div>
					</div>
					@php

					$i++;

					@endphp
					@endforeach

				</div>
			</div>

		</div>



		<div class="p-4 news bg-light margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans">OURS NEWS</small>
					<h4 class=" news-text text-26 font-dm-sans text-bold">Popular News Post</h4>
				</div>
				@php
				$news=App\HomeNews::all();

				@endphp

				<div class="row  margin-cus-top2">

					
					
					<div class="col-md-12 col-lg-6 p-2">

						@for($i = 0; $i <1; $i++)	
						@php
						$date=$news[$i]->date;
						$format = 'Y-m-d';
						$date1 = DateTime::createFromFormat($format, $date);
						$formated_date = $date1->format('F j, Y');
						@endphp
						<div class="text-center">
							<img class=" news-img width-100" src="{{asset($news[$i]->image)}}" alt="">
						</div>
						<p class="font-archivo text-medium-bold mt-5">{{$formated_date}}</p>
						<h3 class="news-text font-archivo text-bold text-26 ">{{$news[$i]->headline}}</h3>
						<p class="text-justify font-archivo text-b-bold text-muted">{{$news[$i]->sub_text}}</p>
						<a class="logo-color font-mulish text-bold text-decoration-none text-14" href="">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
						@endfor
					</div>


					<div class="col-md-12 col-lg-6 p-2">
						@for($i = 1; $i <5; $i++)
						@php
						$date=$news[$i]->date;
						$format = 'Y-m-d';
						$date1 = DateTime::createFromFormat($format, $date);
						$formated_date = $date1->format('F j, Y');
						@endphp
						<div class="bg-white p-4 m-4 border-none">
							<p class="font-archivo text-medium-bold">{{$formated_date}}</p>
							<h3 class="font-archivo text-bold text-20 news-text-2 mb-3">{{$news[$i]->headline}}</h3>
							<a class="logo-color font-mulish text-bold text-decoration-none text-14 " href="">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
						</div>
						@endfor

					</div>


				</div>
			</div>
		</div>

		<div class="bg-muted p-4 margin-cus-top " >
			<div class="container client-bg1"  style="background-image: url(assets/images/clients/bg2.png);">
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans">Clients</small>
					<h4 class="client-text text-26 font-dm-sans text-bold">Trust our clients</h4>
				</div>
				@php
			   $clients=App\HomeClient::all();
			   $a=[];$b=[];$c=[];$d=[];$e=[];$f=[];$g=[];$h=[];$i=[];$j=[];$k=[];$l=[];$m=[];$n=[];$o=[];$p=[];$q=[];$r=[];$s=[];$t=[];$u=[];$v=[];$w=[];$x=[];$y=[];$z=[];
				@endphp
				@foreach($clients as $client)
                  @php
                  $cl=$client->client_name;
                  if($cl[0]=='A'){
                  array_push($a,$cl);
                  }
                  elseif($cl[0]=='B'){
                   array_push($b,$cl);
                  }
                  elseif($cl[0]=='C'){
                   array_push($c,$cl);
                  }
                  elseif($cl[0]=='D'){
                   array_push($d,$cl);
                  }
                  elseif($cl[0]=='E'){
                   array_push($e,$cl);
                  }
                  elseif($cl[0]=='F'){
                   array_push($f,$cl);
                  }
                  elseif($cl[0]=='G'){
                   array_push($g,$cl);
                  }
                  elseif($cl[0]=='H'){
                   array_push($h,$cl);
                  }
                  elseif($cl[0]=='I'){
                   array_push($i,$cl);
                  }
                  elseif($cl[0]=='J'){
                   array_push($j,$cl);
                  }
                  elseif($cl[0]=='K'){
                   array_push($k,$cl);
                  }
                  elseif($cl[0]=='L'){
                   array_push($l,$cl);
                  }
                  elseif($cl[0]=='M'){
                   array_push($m,$cl);
                  }
                  elseif($cl[0]=='N'){
                   array_push($n,$cl);
                  }
                  elseif($cl[0]=='O'){
                   array_push($o,$cl);
                  }
                  elseif($cl[0]=='P'){
                   array_push($p,$cl);
                  }
                  elseif($cl[0]=='Q'){
                   array_push($q,$cl);
                  }
                  elseif($cl[0]=='R'){
                   array_push($r,$cl);
                  }
                  elseif($cl[0]=='S'){
                   array_push($s,$cl);
                  }
                  elseif($cl[0]=='T'){
                   array_push($t,$cl);
                  }
                  elseif($cl[0]=='U'){
                   array_push($u,$cl);
                  }
                  elseif($cl[0]=='V'){
                   array_push($v,$cl);
                  }
                  elseif($cl[0]=='W'){
                   array_push($w,$cl);
                  }
                  elseif($cl[0]=='X'){
                   array_push($x,$cl);
                  }
                  elseif($cl[0]=='Y'){
                   array_push($y,$cl);
                  }
                  else{
                  	array_push($z,$cl);
                  }
                  
                  @endphp
				@endforeach
				<div class="mt-3 text-center">
					<a  onclick='get_clicked(<?php echo json_encode($a);?>,"A")' class="btn btn-default artist-index" role="button">A</a>
					<a onclick='get_clicked(<?php echo json_encode($b);?>,"B")' class="btn btn-default artist-index" role="button">B</a>
					<a onclick='get_clicked(<?php echo json_encode($c);?>,"C")' class="btn btn-default artist-index" role="button">C</a>
					<a onclick='get_clicked(<?php echo json_encode($d);?>,"D")' class="btn btn-default artist-index" role="button">D</a>
					<a onclick='get_clicked(<?php echo json_encode($e);?>,"E")' class="btn btn-default artist-index" role="button">E</a>
					<a onclick='get_clicked(<?php echo json_encode($f);?>,"F")' class="btn btn-default artist-index" role="button">F</a>
					<a onclick='get_clicked(<?php echo json_encode($g);?>,"G")' class="btn btn-default artist-index" role="button">G</a>
					<a onclick='get_clicked(<?php echo json_encode($h);?>,"H")' class="btn btn-default artist-index" role="button">H</a>
					<a onclick='get_clicked(<?php echo json_encode($i);?>,"I")' class="btn btn-default artist-index" role="button">I</a>
					<a onclick='get_clicked(<?php echo json_encode($j);?>,"J")' class="btn btn-default artist-index" role="button">J</a>
					<a onclick='get_clicked(<?php echo json_encode($k);?>,"K")' class="btn btn-default artist-index" role="button">K</a>
					<a onclick='get_clicked(<?php echo json_encode($l);?>,"L")' class="btn btn-default artist-index" role="button">L</a>
					<a onclick='get_clicked(<?php echo json_encode($m);?>,"M")' class="btn btn-default artist-index" role="button">M</a>
					<a onclick='get_clicked(<?php echo json_encode($n);?>,"N")' class="btn btn-default artist-index" role="button">N</a>
					<a onclick='get_clicked(<?php echo json_encode($o);?>,"O")' class="btn btn-default artist-index" role="button">O</a>
					<a onclick='get_clicked(<?php echo json_encode($p);?>,"P")' class="btn btn-default artist-index" role="button">P</a>
					<a onclick='get_clicked(<?php echo json_encode($q);?>,"Q")' class="btn btn-default artist-index" role="button">Q</a>
					<a onclick='get_clicked(<?php echo json_encode($r);?>,"R")' class="btn btn-default artist-index" role="button">R</a>
					<a onclick='get_clicked(<?php echo json_encode($s);?>,"S")' class="btn btn-default artist-index" role="button">S</a>
					<a onclick='get_clicked(<?php echo json_encode($t);?>,"T")' class="btn btn-default artist-index" role="button">T</a>
					<a onclick='get_clicked(<?php echo json_encode($u);?>,"U")' class="btn btn-default artist-index" role="button">U</a>
					<a onclick='get_clicked(<?php echo json_encode($v);?>,"V")' class="btn btn-default artist-index" role="button">V</a>
					<a onclick='get_clicked(<?php echo json_encode($w);?>,"W")' class="btn btn-default artist-index" role="button">W</a>
					<a onclick='get_clicked(<?php echo json_encode($x);?>,"X")' class="btn btn-default artist-index" role="button">X</a>
					<a onclick='get_clicked(<?php echo json_encode($y);?>,"Y")' class="btn btn-default artist-index" role="button">Y</a>
					<a onclick='get_clicked(<?php echo json_encode($z);?>,"Z")' class="btn btn-default artist-index" role="button">Z</a>
					
				</div>
				
               
		<div class="new_client">		
			<div class="client_append letter_A">	
				<div class="rotate-box mt-5 ">
					<div class="latter-box text-white">
						<h2 class="latter text-40">A</h2>
					</div>
				</div>
				<div class="row clients-name">
					<div class="col-md-5 px-4  t-l">
                      
                      @for ($i = 0; $i < ceil(count($a)/2); $i++)
						<h4 class="font-mulish text-medium-bold c-text  text-16">{{$a[$i]}}</h4>
					   @endfor

					</div>

					<div class=" col-md-2  display-prop">
						<div class="vertical">

						</div>

					</div>
					<div class="col-md-5 px-4  t-r">
						 @for ($i = ceil(count($a)/2); $i < count($a); $i++)
						<h4 class="font-mulish text-medium-bold c-text text-16">{{$a[$i]}}</h4>
						 @endfor


					</div>

				</div>
				</div>
			</div>	


			</div>
		</div>

		<div class="p-4 margin-cus-top">
			<div class="container"  >
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans">WE WORK WITH</small>
					<h4 class="mj-text text-26 font-dm-sans text-bold">Our Major Clients</h4>
				</div>
				<div class="row client-bg" style="background-image: url(assets/images/clients/bg.png);">
					@php
					$major_clients=App\HomeMajorClient::all();
					@endphp
					@foreach($major_clients as $m_c)
					<div class="col-sm-6 col-md-4 col-lg-3 text-center p-4 ">
						<div class="text-center c-padding-border bg-white">
							<img class="hight-client p-2" src="{{asset($m_c->image)}}" alt="">
						</div>
					</div>
					@endforeach

				</div>
				<div class="middle mt-5">
					<button class="customer_button text-b-bold font-mulish">View All Customers</button>
				</div>
			</div>

		</div>

		<div class="bg-muted  margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans text-uppercase">Testimonials</small>
					<h4 class="testimonial-text text-26 font-dm-sans text-bold">What our customer say</h4>
				</div>
				<div class="row pt-4">

					@php
					$testimonials=App\HomeTestimonial::all();
					@endphp
					@foreach($testimonials as $tm)
					<div class=" col-sm-12 col-md-6 col-lg-4">
						<div class="border border-radius-10 p-3 my-2" >
							<img class="card-img-top width-40 border-radius" src="{{asset($tm->image)}}" alt="">
							<div class="card-body">
								<div class="mt-2">
									<p class="text-18 font-mulish text-medium-bold text-muted">{{$tm->text}}</p>

								</div >

								<div class="mt-5">
									<h4 class="font-mulish text-bold">{{$tm->name}}</h4>
									<p class=" mt-3 text-uppercase font-mulish text-medium-bold text-muted text-16">{{$tm->designation}}</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>

		</div>

		<div class=" margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">
					<small class="text-bold font-dm-sans text-uppercase">AWARD</small>
					<h4 class="award-text text-26 font-dm-sans text-bold">Recognition, Award, Concern</h4>
				</div>
				<div class="row">
					@php
					$recognition=App\HomeRecognition::all();
					@endphp
					@foreach($recognition as $rg)
					<div class="col-sm-6 col-md-4 col-lg-3 text-center p-4 ">
						<div class="text-center ">
							<img class="hight-client2 " src="{{asset($rg->image)}}" alt="">
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="container mt-5">
				<div class="row">
					@php
					$award=App\HomeAward::first();
					@endphp
					@isset($award)
					<div class=" col-md-12 col-lg-6 c-padding-border2">
						<div class="text-center">
							<img class="award-img width-70" src="{{asset($award->image)}}">
						</div>
						<div class="c-award-padding">
							<h3 class="font-archivo text-b-bold text-22 ">{{$award->head_text}}</h3>
							<p class="font-mulish text-medium-bold text-muted mt-3">{{$award->sub_text}}</p>
						</div>
					</div>
					@endisset
					<div class=" col-md-12 col-lg-6  pt-5">
						@php
						$member=App\HomeMember::first();
						@endphp
						@isset($member)
						<div class="c-padding-border">
							<h3 class="font-archivo text-b-bold text-20 ">{{$member->headline}}</h3>
							<p class="font-mulish text-medium-bold text-muted mt-4" >{{$member->text}}</p>
							<div class="row mt-5 d-flex justify-content-center align-items-center">
								@foreach($member->member_image as $img)
								<div class="col-md-5 d-flex justify-content-center align-items-center ">
									<img class="width-80" src="{{$img->image}}">
								</div>
								@endforeach
								

							</div>
						</div>
						@endisset

						@php
						$concern=App\HomeConcern::first();
						@endphp
						@isset($concern)
						<div class="mt-5 c-padding-border ml-5">
							<h3 class="font-archivo text-b-bold text-20 text-uppercase ">{{$concern->headline}}</h3>
							<p class="font-mulish text-medium-bold text-muted mt-4" >{{$concern->text}}</p>
							<div class="row mt-5 d-flex justify-content-center align-items-center">
									@foreach($concern->concern_image as $img)
								<div class="col-md-4 d-flex justify-content-center align-items-center ">
									<img class="width-80" src="{{$img->image}}">
								</div>

								 @endforeach

							</div>
						</div>
						@endisset

					</div>

				</div>
			</div>

		</div>

		<div class="p-4 margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">

					<h4 class="contact-us-text
					text-26 font-dm-sans text-bold">CONTACT US</h4>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-6  p-5 ">
						<div class="mb-5">
							<h4 class="text-b-bold font-archivo text-20 support-text ">Head Office</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-map-marker"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">House 21, Road 31, Sector 7, Uttara, Dhaka-1230 </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">info@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-globe"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-14 support-text-2" style="color: #728FCE;">www.systechdigital.com </span>
								</div>
							</div>

						</div>
						<div class="mb-5 ">
							<h4 class="text-b-bold font-archivo text-20 support-text ">City Office</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-map-marker"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">Level 12, Software Technology Park (Janata Tower), 49 Karwan Bazar Road, Dhaka-1215 </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">daisy@systechdigital.com</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-globe"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-14 support-text-2 " style="color: #728FCE;">www.systechdigital.com </span>
								</div>
							</div>

						</div>
						<div class="mb-5 ">
							<h4 class="text-b-bold font-archivo text-20 support-text ">Chittagong Office
							</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-map-marker"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">135, Dewan Square (2nd floor), Room No: 302, (Dewanhat More), Double Mooring, Chittagong </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2" >arif@systechdigital.com</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-globe"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-14 support-text-2 " style="color: #728FCE;">www.systechdigital.com </span>
								</div>
							</div>

						</div>
						<div class="mb-5 ">
							<h4 class="text-b-bold font-archivo text-20 support-text ">Japan Office</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-map-marker"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">2-73-3 Kameari, Katsushika-ku, Tokyo 125-0061 Tokyo 502 </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2" >info@systechdigital.co.jp</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-globe"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-14 support-text-2 " style="color: #728FCE;">www.systechdigital.co.jp</span>
								</div>
							</div>

						</div>
						<div class="mb-5 ">
							<h4 class="text-b-bold font-archivo text-20 support-text ">UK Office</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-map-marker"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">22 Cavell Street, London, United Kingdom, E1 2HP</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2" >info@systechdigital.co.uk</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">Company number: 11895952</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-globe"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-14 support-text-2" style="color: #728FCE;">www.systechdigital.co.uk</span>
								</div>
							</div>

						</div>
					</div>
					<div class="col-sm-12 col-md-6 form-margin " >
						<div class="custom-form">
							<form>

								<div class="row mb-5">
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Name</label>
										<input type="text"  class="border-radius-10 form-control p-2" id="" placeholder="Name">
									</div>
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Designation</label>
										<input type="text" class="form-control p-2 border-radius-10" id="" placeholder="Select">
									</div>
								</div>
								<div class="row mb-5">
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Company/ Organization</label>
										<input type="text"  class="form-control p-2 border-radius-10" id="" placeholder="Company/ Organization">
									</div>
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Email</label>
										<input type="text" class="form-control p-2 border-radius-10" id="" placeholder="Email">
									</div>
								</div>
								<div class="row mb-5">
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Phone</label>
										<input type="text"  class="form-control p-2 border-radius-10" id="" placeholder="Phone">
									</div>
									<div class="form-group col-md-6">
										<label for="" class="font-archivo text-b-bold">Subject</label>
										<input type="text" class="form-control p-2 border-radius-10" id="" placeholder="Subject">
									</div>
								</div>
								<div class="form-group mb-5">
									<label for="" class="font-archivo text-b-bold">Project Details</label>
									<textarea class="form-control p-2 border-radius-10" id="
									" placeholder="write something for us" rows="4"></textarea>
								</div>
								<div>
									<label class="font-archivo text-b-bold" for="">Project document </label><span class=" font-archivo text-medium-bold text-12">(Optional)</span>
									<div class="form_file_input d-flex align-items-center justify-content-center text-center">
										<!-- <input type="file" class="width-50 " id=""> -->
										<div class="">

											<i class="fas fa-paperclip text-muted"></i>

											<p class="font-archivo text-medium-bold text-muted" >Attach Files</p>
										</div>
									</div>
								</div>
								<button class="mt-5 font-dm-sans text-bold message-button text-12">Send Message</button>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="p-4 margin-cus-top">
			<div class="container">
				<div class="row text-center p-4">

					<h4 class="contact-us-text text-26 font-dm-sans text-bold">Contact For Support Center</h4>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-4  p-5 ">
						<div class=" ">
							<h4 class="text-bold font-archivo text-20 support-text ">Information</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">info@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">+88-02-48951636 </span>
								</div>
							</div>

						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4  p-5 ">
						<div class=" ">
							<h4 class="text-bold font-archivo text-20 support-text">Sales</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">info@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">+88-02-48951636 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4  p-5 ">
						<div class=" ">
							<h4 class="text-bold font-archivo text-20 support-text">Support Service - Software & Hosting</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">info@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">+88-02-48951636 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4  p-5 ">
						<div class=" ">
							<h4 class="text-bold font-archivo text-20 support-text">Support Service - HR & Payroll</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">info@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold text-14 support-text-2 font-archivo hotline">(HOT LINE)</span> <span class="text-b-bold font-archivo text-muted text-14 support-text-2">+88-01785646006 & +88-01844527170</span> 
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-4  p-5 ">

						<div class=" ">
							<h4 class="text-b-bold font-archivo text-20 support-text">Support Service - WDB BGMEA</h4>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="far fa-envelope"></i></span>
								</div>
								<div class="col-md-11">
									<span class="text-b-bold font-archivo text-muted text-14 support-text-2">wdb@systechdigital.com </span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">	
									<span class=""><i class="fas fa-phone"></i></span>
								</div>
								<div class="col-md-11">

									<span class="text-b-bold text-14 support-text-2 font-archivo hotline">(HOT LINE)</span> <span class="text-b-bold font-archivo text-muted text-14 support-text-2">+88-01785646006 & +88-01844527170</span> 
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>


		</div>









		<div class="google-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.451347921771!2d90.39542244931363!3d23.87360878445284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43c88bafcc7%3A0x4a05a80c79c54833!2sSystech%20Digital%20Limited!5e0!3m2!1sen!2sbd!4v1622541814522!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>

		<div class="footer py-3 text-center">
			<div class="container ">
				<div class="row footer-content">

					<div class="footer-text text-12 col-lg-6 col-md-12 text-lg-center  text-md-center text-sm-center text-xs-center">
						&copy;2001-2021 All  Rights  Reserved Systech Digital Limited
					</div>
					<div class="footer-text text-12 col-lg-6 col-md-12 text-lg-center  text-md-center text-sm-center text-xs-center">
						<div class="footer-nav ">
							<a href="" class="footer-nav-link">Home</a>
							<a href="" class="footer-nav-link">Blog</a>
							<a href="" class="footer-nav-link">Career</a>
							<a href="" class="footer-nav-link">Contact</a>
							<a href="" class="footer-nav-link">Sales</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- <script type="text/javascript" src="assets/js/boostrap/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="assets/js/boostrap/popper.min.js"></script>
		<script type="text/javascript" src="assets/js/boostrap/bootstrap.min.js"></script> -->

<!-- 		  <script>
    $("#navbarSupportedContent a:not(.dropdown-toggle)").click(function() {
      $("#navbarSupportedContent").collapse("hide");
    });
  </script>
-->	
<script type="text/javascript">
	function get_clicked(arr,letter){
       $('.letter_A').hide();
		var output='<div class="client_append">	<div class="rotate-box mt-5 "><div class="latter-box text-white"><h2 class="latter text-40">'+letter+'</h2></div></div><div class="row clients-name"><div class="col-md-5 px-4  t-l">';
            
              for(var i = 0; i < Math.ceil((arr.length)/2) ; i++){

					output+='<h4 class="font-mulish text-medium-bold c-text  text-16">'+arr[i]+'</h4>';
				
                }
             output+='</div><div class=" col-md-2  display-prop"><div class="vertical"></div></div><div class="col-md-5 px-4  t-r">'

		      for(var i = Math.ceil((arr.length)/2); i < arr.length ; i++){

					output+='<h4 class="font-mulish text-medium-bold c-text  text-16">'+arr[i]+'</h4>';
				
                }

                output+='</div></div></div>';

                $('.new_client').html(output);
	}
</script>

</body>
</html>