@extends('app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

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
    <form action="{{ route('update_reply') }}" method="POST">
    @csrf
        <input type="hidden" name="id" value="{{ $reply->id }}">
        <input type="hidden" name="issue_id" value="{{ $reply->issue()->first()->id }}">

        <div class="row">
            <h2>回覆更新</h2>
        </div>

        <hr>

        <div class="row">
            <textarea name="reply" id="reply" required>{{ $reply->reply }}</textarea>
        </div>

        <div class="row">
            <input type="submit" class="btn primary" value="更新回覆" />
        </div>

    </div>
    </form>

    <script>
        CKEDITOR.config.width = '100%';
        CKEDITOR.config.height= 400;
        var editor = CKEDITOR.replace('reply');
        editor.on( 'required', function( evt ) {
            editor.showNotification( 'This field is required.', 'warning' );
            evt.cancel();
        } );
    </script>

</section>
@endsection