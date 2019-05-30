<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>高科大學生議會</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/splogo.png') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
	    <link href="{{ asset('asset/css/app.css') }}" rel="stylesheet">
		<noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141147198-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-141147198-1');
		</script>

	</head>

	<style>
		.issue_content {
			height: 200px;
			overflow: hidden;
		}
	</style>

	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<img src="images/image.png"> 
						<h1><a href="index.html">高科大 學生議會</a></h1>

						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="/">首頁</a></li>
											<li><a href="https://drive.google.com/open?id=12lGM-A3cyeNIoHwIaVF41zQXyN-CH8FH">法規編定</a></li>
											<li><a href="https://drive.google.com/drive/u/1/folders/1xlwveAZLA6WQ8eDrCoDRJanAiW0d0dlv?fbclid=IwAR3ZknGSfeec6VSOywmBOwTIr_o935u5k7Kd9R7KMtLaQRTzcg4IliM2_pI">預算公佈</a></li>
											<li><a href="{{ route('show_all_issue') }}">議題追蹤系統</a></li>
											<li><a href="{{ route('show_member') }}">團隊成員</a></li>
											@if(Auth::check())
											<li><a href="{{ route('show_admin_panel') }}">網站後台</a></li>
											@endif
											<!-- <li><a href="#">Sign Up</a></li>
											<li><a href="#">Log In</a></li> -->
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

					<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<h2>
							國立高雄科技大學<br/> 
							學生議會<br>
							<img style="width: 50px" src="images/image.png" alt="">
						</h2>
						<p>
							在學校遇到了什麼問題了嗎？<br/>
							對學校有什麼意見嗎？<br/>
							有意見就要立即反饋！你可以聯絡我們<a href="https://www.facebook.com/kuassp/">粉專</a><br>
							或是可以透過下面表單給我們意見。
						</p>
						<ul class="actions special">
							<li><a href="{{ route('show_issue_add') }}" class="button primary">立即反饋</a></li>
						</ul>
					</div>
					<a href="#three" class="more scrolly">瞭解議會</a>
				</section>

				<!-- One -->
				<section id="three" class="wrapper style3 special">
					<div class="inner">
						<header class="major">
							<h2>議題追蹤</h2>
						</header>
						<ul class="features">

							@foreach($issues as $issue)
							<li class="icon fa-paper-plane-o">
								<a href="/issue/id/{{ $issue->id }}">
									<h3>{{ $issue->title }}</h3>
									<div class="issue_content">
										@php
											echo $issue->describe;
										@endphp
									</div>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</section>


				<section id="one" class="wrapper style1 special">
					<div class="inner">
						<header class="major">
							<h2>學生議會簡介</h2>
							<p class="intro_section">
							在91.92級推動之下，以往學生活動中心在93級正式改制為學生政府形式的「學生自治會」，成立了第一屆的學生會與學生議會。
							在三權分立的架構下，學生議會擁有立法權，依學生自治會組織章程第二十五條規定，學生議會職權如下：
							</p>

							<br>
							<p class="intro_section">一、修訂本會各項學生自治章程</p>
							<p class="intro_section"> 二、審查本會之法案、預算案及決算案。惟審查預算案時，不得為增支出之決議。</p>
							<p class="intro_section">三、要求本會推派之各級會議學生代表及學生會相關人員列席學生議會報告並備詢。</p>
							<p class="intro_section">四、審查並同意會長所提學生會部長級以上之幹部及評議委員之任命案。</p>
							<p class="intro_section">五、對本會不法或失職之正副會長、幹部、評議委員及本會推派之各級會議學生代表有糾正權、糾舉權及彈劾權。</p>
							<p class="intro_section">六、代表全體會員向學校及學生會反應問題。</p>
							<p class="intro_section">七、各系之議員，可向該系之會長要求查帳。</p>
						</header>
						<ul class="icons major">
							<li><span class="icon fa-balance-scale major style1"><span class="label">Lorem</span></span></li>
							<li><span class="icon fa-dollar major style2"><span class="label">Ipsum</span></span></li>
							<li><span class="icon fa-eye major style3"><span class="label">Dolor</span></span></li>
						</ul>
					</div>
				</section>

				<!-- Two -->
				<section id="two" class="wrapper alt style2">
					<section class="spotlight">
						<div class="image"><img src="images/sr.jpg" alt="" /></div><div class="content">
							<h2>學生權益委員會</h2>
							<p>學生權益委員會，顧名思義就是為了學生權益發聲的地方，我們接受學生陳情，只要發現任何有損學生權益的問題，我們一定義不容辭跑遍相關處室進行詢問，比所有的學生更快了解最新資訊，替所有學生爭取權利。</p>
						</div>
					</section>
					<section class="spotlight">
						<div class="image"><img src="images/design.jpg" alt="" /></div><div class="content">
							<h2>編輯委員會</h2>
							<p>編輯委員會的工作職掌比較內部，主要負責議會粉絲專業每周的更新 以及議會網站的經營。另外所有活動、貼文的文宣和相關周邊也都是由編委進行設計</p>
						</div>
					</section>
					<section class="spotlight">
						<div class="image"><img src="images/fin.jpg" alt="" /></div><div class="content">
							<h2>財務委員會</h2>
							<p>財委委員會主要職責為監督學生會費使用與執行情況。在財務相關法規、制度上，會與財務委員會議員們進行討論，訂定出合適的法規及制度，以利於學生自治在財務上之健全。</p>
						</div>
					</section>
					<section class="spotlight">
						<div class="image"><img src="images/law.jpg" alt="" /></div><div class="content">
							<h2>法規暨紀律獎懲委員會</h2>
							<p>現在的法規暨紀律獎懲委員會是由委別總召、兩位祕書以及顧問組成，主要負責學生自治組織的法規制定與修改，出席率的規範與統計，發現有學生議員有違法事宜時的懲戒案蒐證與懲罰。</p>
						</div>
					</section>
					<section class="spotlight">
						<div class="image"><img src="images/sec.jpg" alt="" /></div><div class="content">
							<h2>祕書處</h2>
							<p>祕書處功用就如同一間企業的祕書部般，看似不重要卻絕對不能沒有的部別，它扮演處理大小事務的角色，例如：會議資料整理及輸出、文書收發、開會地點安排、...等，主要目的莫過於讓議會可以運作的更加順利，讓議會可以發揮最大功效。</p>
						</div>
					</section>
				</section>

				<!-- Three -->
				<!-- CTA -->
				<section id="cta" class="wrapper style4">
					<div class="inner">
						<header>
							<h2>聯絡我們</h2>
							<p>議會信箱： nkustkuassp@nkust.edu.tw <br>
							財務委員信箱： nkustspfc@nkust.edu.tw</p>
						</header>
						<ul class="actions stacked">
							<li><a href="{{ route('show_issue_add') }}" class="button fit primary">議題反應</a></li>
							<li><a href="https://www.facebook.com/kuassp/" class="button fit">粉專</a></li>
						</ul>
					</div>
				</section>

				<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://www.facebook.com/kuassp/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="mailto:nkustkuassp@nkust.edu.tw" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						<li><a href="mailto:nkustspfc@nkust.edu.tw" class="icon fa-dollar"><span class="label">Email</span></a></li>
					</ul>
				</footer>

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