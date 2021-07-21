@extends('layouts.front-main')

@section('title','E-learning Cendekiaku')
@section('content')
    <!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
		</div>
		<div class="container">
			<div class="banner_content text-center">
				<h3>Belajar Dimana Saja & Kapan Saja <br /> Mudah Dengan Learning</h3>
				<p>Dengan Learning kemudahan kegiatan belajar mengajar dapat terpenuhi. Para Dosen dan Mahasiswa dapat
					belajar meski banyak halangan atau rintangan. Pembelajaran Terstruktur dan Efektif hanya di
					Learning! Nikmati kemudahan belajar dan materi terlengkap dari kami! </p>
				<a class="main_btn" href="{{ route('register')}}">Daftar Sekarang</a>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->


<!--================Finance Area =================-->
<section class="finance_area">
	<div class="container">
		<div class="finance_inner row">
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-rocket"></i>
						</div>
						<div class="media-body">
							<h5>Cepat & <br />Mudah</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-earth"></i>
						</div>
						<div class="media-body">
							<h5>Kompetensi <br />Internasional</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-smile"></i>
						</div>
						<div class="media-body">
							<h5>User <br /> Friendly</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-tag"></i>
						</div>
						<div class="media-body">
							<h5>Simple & <br />Tinggal Belajar!</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Finance Area =================-->


<!--================Courses Area =================-->
<section class="courses_area p_40">
	<div class="container">
		<div class="main_title">
			<h2>Program Studi yang tersedia di Learning</h2>
			<p>Dibawah ini merupakan Program Studi yang tersedia di website Learning. Tiap semester mempunyai
				materi yang berbeda. Oleh karena itu nikmati materi dan selamat
				belajar!</p>
		</div>
		<div class="row courses_inner">
			<div class="col-lg-12">
				<div class="grid_inner">
					<div class="grid_item wd55">
						<div class="courses_item">
							<img src="{{ asset('frontend/img/courses/akuntansi1.jpg')}}" alt="">
							<div class="hover_text">
								<a class="cat" href="#">Gratis</a>
								<a href="javaScript:void(0);">
									<h4>Program Studi Akuntansi</h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i>50</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i>Dosen Akuntansi</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd44">
						<div class="courses_item">
							<img src="{{ asset('frontend/img/courses/manajemen.jpg')}}" alt="">
							<div class="hover_text">
								<a class="cat" href="#">Gratis</a>
								<a href="javaScript:void(0);">
									<h4>Program Studi Manajemen</h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 50</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i> Dosen Manajemen</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Courses Area =================-->


<!--================Team Area =================-->
<section class="team_area p_20">
	<div class="container">
		<div class="main_title">
			<h2>Testimonial Para Mahasiswa Learning</h2>
			<p>Berikut kesan dan pesan para Mahasiswa yang sudah menggunakan layanan website Learning. Pastikan kamu
				juga mencoba layanan kami ya! di Learning semoga kamu menikmati semua materi dan pelajaran yang Dosen
				kami buat! Selamat Belajar! </p>
		</div>
		<section class="testimonials_area p_20">
			<div class="container">
				<div class="testi_slider owl-carousel">
					<div class="item">
						<div class="testi_item">
							<img src="{{ asset('frontend/img/testimonials/testi-4.png')}}" alt="">
							<h4>Ester</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Materi nya lengkap, Dosennya keren keren semua dan dapat mudah dimengerti materinya.
								Pokoknya Semangat Learning! Tetap jadi yang terbaik untuk STIE CendekiaKU. Semoga
								dengan adanya website learning, Mahasiswa STIE CendekiaKU
								Semarang dapat belajar dengan mudah dan para Mahasiswa dapat mencetak prestrasi untuk
								Kampus kita tercinta ini. <span class="text-danger"> &#10084;</span>
							</p>
						</div>
					</div>
					<div class="item">
						<div class="testi_item">
							<img src="{{ asset('frontend/img/testimonials/testi-5.png')}}" alt="">
							<h4>Rysad</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Dosennya baik baik, materinya terstruktur dan materi nya terus update. Meski Dosen
								tidak ada, kita masih bisa melihat materi yang dibuat Dosen di Website Learning.
								Terima kasih learning!. Semoga dengan adanya learning ini kita para Mahasiswa lebih
								produktif dan dapat meningkatkan kualitas SDM untuk negara kita tercinta ini yaitu
								negara Indonesia</p>
						</div>
					</div>
					<div class="item">
						<div class="testi_item">
							<img src="{{ asset('frontend/img/testimonials/testi-6.png')}}" alt="">
							<h4>Ilham</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Website yang sangat berguna untuk para Mahasiswa millenial. Karena dengan learning ini
								kalian bisa belajar dimana saja dan kapan saja! . Meski Dosen tidak bisa hadir atau
								kita tidak masuk kampus karena sakit kita masih bisa belajar di website learning
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<!--================End Team Area =================-->

@endsection
