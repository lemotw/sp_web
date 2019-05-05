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
    <form action="{{ route('reply_issue') }}" method="POST">
    @csrf
        <input type="hidden" name="issue_id" value="{{ $issue->id }}">

        <div class="row">
            <h2>議題回覆</h2>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <label for="title">議題標題： {{ $issue->title }}</label>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <label for="describe">議題本文：</label>
            </div>
        </div>

        <div class="issue_content">
            @php
                echo $issue->describe;
            @endphp 
        </div>

        <div class="row">
            <textarea name="reply" id="reply" required></textarea>
        </div>

        <div class="row">
            <input type="submit" class="btn primary" value="回覆議題" />
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