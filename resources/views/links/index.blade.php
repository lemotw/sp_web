<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <title>@nkust_sp 高科大學生議會</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/splogo.png') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/link_main.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/service.css') }}" />
        
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141147198-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-141147198-1');
		</script>
    </head>

    <body class="service theme colourway-snow video no-touch browser-chrome">

        <div class="service">

           <header class="service-header"></header> 

            <section class="main" style="margin-top:5%;">
                <div class="container service-container">

                    <div class="user_area">
                        <div class="text-xs-center">
                            <span class="img-circle">
                                <img class="user-img" src="{{ asset('images/splogo_b.jpg') }}">
                            </span>
                            <a class="user-name btn" style="margin:20px;">@nkust_sp</a>
                        </div>
                    </div>

                    <div class="links">
                        <div>
                            <div>
                                @foreach($links as $link)
                                <div class="link"><a href="{{ $link->link }}" class="btn btn-link" target="_blank">{{ $link->link_name }}</a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
       
    </body>

</html>