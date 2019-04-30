<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>高科大學生議會</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/splogo.png') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<img src="{{ asset('images/image.png') }}"> 
						<a href="/">
							<a href="/"><h1 style="font-size:1em; font-weight:bold;">高科大 學生議會</h1></a>
						</a>

						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/">首頁</a></li>
											<li><a href="https://drive.google.com/open?id=12lGM-A3cyeNIoHwIaVF41zQXyN-CH8FH">法規編定</a></li>
											<li><a href="#">預算公佈</a></li>
											<li><a href="/issue">議題追蹤系統</a></li>
											<li><a href="elements.html">團隊成員</a></li>
											<!-- <li><a href="#">Sign Up</a></li>
											<li><a href="#">Log In</a></li> -->
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>



				@yield('content')

			</div>

		<!-- Scripts -->
			<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>