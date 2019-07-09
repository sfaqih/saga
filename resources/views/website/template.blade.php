<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>SAGA DIGITAL STUDIO</title>

        <!-- Favicon for Iphon, Ipod, Browser, Android Devies etc -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/fav/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/fav/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/fav/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/fav/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/fav/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/fav/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/fav/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/fav/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/fav/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/fav/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/fav/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/fav/favicon-16x16.png') }}">

        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->

        <!-- Fonts Google Poppins & Raleway,Open Sans, Droid Serif, Glyphicons, Font Awesome, Custom Icons  -->
        <link href='http://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700%7CRaleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7COpen+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic%7CDroid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

        <!-- CSS Plugin & Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/devsolution.assets.min.css') }}">

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Responsive -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    </head>
<body>
	<!-- Site Container -->
	<div class="site-container animsition">
		<!-- Header -->
		<header class="clearfix">
			<!-- Menu Bar Navigation -->
			<div class="menubar">
				<div class="container">
					<div class="navbar">
						
						<!-- Navigation -->
						<div class="navbar-collapse collapse navbar-right">
							<ul class="navbar-nav nav">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
							</ul>
						</div>
						<!-- End Navigation -->
					</div>
				</div>
			</div>
			<!-- End Menu Bar Navigation -->
		</header>
		<!-- End Header -->

		<!-- Revolution Slider -->
		@yield('banner')
		<!-- /Revolution Slider -->
		<!-- End Slider -->

		<!-- Wrapper of page -->
		@yield('content')
		<!-- End Wrapper of page -->
		
		<!-- Footer -->
		<footer>
			<!-- Bottom Footer -->
			<div class="bottom-block padding paddv-60">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
							<p>Copyright &copy; 2016 <a href="#">Industry</a>.  All rights reserved</p>
						</div>
					</div>
				</div>
				<!-- End Bottom Footer -->
				<!-- Go Top -->
				<a href="#" id="gotop" class="gotop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
				<!-- End Go Top -->
			</div>
		</footer>
		<!-- End Footer -->
	</div>
	<!-- /Site Container -->

	<!-- ========== Responsive Menu ========== -->
	<div class="mobile-menu" id="mobile-menu">
		<a href="#" class="close-menu">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Navigations Widgets -->
			<div class="widgets widget-menu">
				<h2>Main Menu</h2>
				<ul>
					<li class="active"><a href="./index.html">Home</a></li>
					<li>
						<a href="./our-services.html">Our Services</a>
						<ul>
							<li><a href="./target-details.html">Target Details</a></li>
						</ul>
					</li>
					<li>
						<a href="./projects.html">Projects</a>
						<ul>
							<li><a href="./projects-two.html">Projects 2 Column</a></li>
							<li><a href="./projects-three.html">Projects 3 Column</a></li>
							<li><a href="./projects-four.html">Projects 4 Column</a></li>
							<li><a href="./projects-details.html">Projects Detail</a></li>
						</ul>
					</li>
					<li>
						<a href="./blog.html">News</a>
						<ul>
							<li><a href="./industry-detail.html">Single Post</a></li>
						</ul>
					</li>
					<li><a href="./about-us.html">About Us</a></li>
					<li>
						<a href="#">Pages</a>
						<ul>
							<li><a href="./get-qoute.html">Get Qoute</a></li>
							<li><a href="./404.html">404 Page</a></li>
							<li><a href="./coming-soon.html">Coming Soon</a></li>
						</ul>
					</li>
					<li><a href="./contact.html">Contact</a></li>
				</ul>
			</div>
			<!-- End Navigation Widgets -->

			<!-- Text Widgets -->
			<div class="widgets text-widget">
				<h2>About us</h2>
				<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie. consequat.</p>
			</div>
			<!-- End Text Widgets -->
		</div>	
		<!-- End Sidebar -->
	</div>
	<!-- ========== END Responsive Menu ========== -->

	<!-- Search Overlay -->
	<div class="overlay overlay-contentscale">
		<a href="#" class="overlay-close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>

		<div id="mk-fullscreen-search-wrapper">
			<form method="get" id="mk-fullscreen-searchform" action="index.html">
				<input type="text" value="" name="s" id="mk-fullscreen-search-input" placeholder="Start search and press enter...">
				<i class="pe-7s-search">
					<input value="" type="submit">
				</i>
			</form>
		</div>
	</div>
	<!-- End Search Overlay -->

	<!--Google Maps JavaScript API (It's Important) -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPs_H3SSavr4AjVO_HPUUcplIhamniJzQ" type="text/javascript"></script>

	<!-- Setup of JS -->
	<script type="text/javascript" src="{{ asset('assets/js/devsolution.assets.min.js') }}"></script> <!-- Its important to be before all JS files included -->
	<script type="text/javascript" src="{{ asset('assets/js/devsolution.setup.js') }}"></script>

	<!-- RS5.0 Core JS Files -->

	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

	<!-- Just in local file don't use on Server -->
	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<!-- End Just in local file don't use on Server -->

</body>

</html>