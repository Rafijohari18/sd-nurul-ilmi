@extends('layouts.frontend')
@section('title','Home - '. $app_name->value)
@section('css')
<style>


@media screen and (max-width: 768px) {
	#logo-yayasan{
		width:50px;
		heigth:auto;
		border-radius:100%;
		-ms-transform: translateY(50%);
		transform: translateY(50%);
	}
	.card-title{
  		-ms-transform: translateX(40%);
  		transform: translateX(40%);
		margin-top:-10px;
	}
	#lable-sekolah{
		margin-top:15px;
	}

	.counter-entry {
		bottom: 10px;
		margin-left: 80px;
	}

}

#lable-sekolah{
	border-top-left-radius: 15px 15px;
	border-bottom-right-radius: 15px 15px;
	height:80px;
}

</style>
@endsection

@section('content')

<aside id="colorlib-hero">
	<div class="flexslider">
		<ul class="slides">
			@foreach($slider as $slid)
				<li style="background-image: url({{ asset($slid->image) }});">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<h2>{{ $slid->title }}</h2>
										<h1>{{ strip_tags($slid->content) }}</h1>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			@endforeach
			
		</ul>
	</div>
</aside>
<!-- <div class="colorlib-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12 search-wrap">
				<div class="search-wrap-2">
	
					<div class="row justify-content-center align-items-center">
						@foreach($banner_header as $banner)
						<a href="{{ strip_tags($banner->content) }}">
						<div class="col-md-3 bg-primary mb-3" id="lable-sekolah"> 
							<div class="card">
								
								<div class="col-md-4">
									<img src="{{ asset($banner->cover)}}" alt="logo-sd" id="logo-yayasan">
								</div>
								<div class="col-md-8 ">
									<div class="counter-entry">
										<div class="desc">
											<span class="colorlib-counter js-counter" data-from="0" data-to="{{ strip_tags($banner->content) }}" data-speed="5000" data-refresh-interval="50"></span>
											<span class="colorlib-counter-label">{{ $banner->title }}</span>
										</div>
									</div>
								

								</div>
									
							</div>
						</div>
						</a>
						@endforeach
						
					
						
					</div>
					
				
			</div>
		</div>
	</div>



</div> -->

<div id="colorlib-counter" class="colorlib-counters">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="about-desc">
					@foreach($foto_ketua as $key => $foto)
					<div class="about-img-{{ $key + 1}} animate-box" style="background-image: url({{ asset($foto->file) }});"></div>
					@endforeach
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12 colorlib-heading animate-box">
						<h1 class="heading-big">{{ $sambutan->title }}</h1>
						<h2>{{ $sambutan->title }} </h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						{!! $sambutan->content !!}
					</div>
					@foreach($banner_header as $banner)

					<div class="col-md-4 col-sm-4 animate-box">
							<div class="counter-entry">
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="{{ strip_tags($banner->content) }}" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">{{ $banner->title }}</span>
								</div>
							</div>
					</div>
					@endforeach
				
				</div>
			</div>


		</div>
	</div>
</div>

<div class="colorlib-classes">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
				<h1 class="heading-big">Artikel & Berita Terbaru</h1>
				<h2>Artikel & Berita Terbaru</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 animate-box">
				<div class="owl-carousel">
					@foreach($berita_terbaru as $berita)
					<div class="item">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ asset($berita->cover)}});">
							</div>
							<div class="wrap">
								<div class="desc">
									<span class="teacher">{{ $berita->user->name }}</span>
									<h3><a href="#">{{ $berita->title }}</a></h3>
								</div>
								<div class="pricing">
									<p><a href="{{ route('berita.detail',['slug' => $berita->slug]) }}" class="btn btn-primary">Baca Selengkapnya</a> <span class="more"><a href="#"><i class="icon-link"></i></a></span></p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>



@endsection

	