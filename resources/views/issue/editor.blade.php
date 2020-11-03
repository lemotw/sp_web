@extends('app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
	$(document).ready(function() {
		$("form[id=contact-form]").submit(function(ev){
			if(grecaptcha.getResponse() != "") {
				return true;
			}

			alert('請認證！');
			return false;
		});
	});
</script>

<style>
    #main-form{
        width: 80%;
        background-color: #ffffff;
        border-radius: 25px;
        margin: 5em auto;
    }

    .row > h2 {
        color: #101010;
        margin: 0 auto;
        font-weight: bold;
        padding: 0;
    }

    .row > .col > label {
        color: #303030;
        font-size: 12pt;
        padding: 0px;
    }

    .row > input {
        margin: 0 auto;
    }

    .row {
        margin: 1em;
    }
</style>

<section id="one" style="display:flex;">


    <div id="main-form" class="container">
    <form action="{{ route('add_issue') }}" method="POST">
    @csrf

        <div class="row">
            <h2>新增議題</h2>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <label for="title">議題標題：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="title" required>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="title">聯絡資料(ex. 電話、mail....etc 可匿名，回報問題狀況用)：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="contact">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="describe">議題本文：</label>
            </div>
        </div>
        <div class="row">
            <textarea name="describe" id="describe" required></textarea>
        </div>

        <div class="row">
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_PB') }}"></div>
        </div>

        <div class="row">
            <input type="submit" class="btn primary" value="新增議題" />
        </div>

    </div>
    </form>

    <script>
        CKEDITOR.config.width = '100%';
        CKEDITOR.config.height= 400;
        var editor = CKEDITOR.replace('describe');
        editor.on( 'required', function( evt ) {
            editor.showNotification( 'This field is required.', 'warning' );
            evt.cancel();
        } );
    </script>

</section>
@endsection