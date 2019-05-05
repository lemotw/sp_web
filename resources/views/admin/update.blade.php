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
    <form action="{{ route('update_issue') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $issue->id }}">

        <div class="row">
            <h2>議題修改</h2>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <label for="title">議題標題：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="title" value="{{ $issue->title }}" required>
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
                <input type="text" class="form-control" name="contact" value="{{ $issue->contact }}">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="describe">議題版面：</label>
            </div>
        </div>

        <div class="row" style="padding: 1em;">
            <select name="panel_select">
                <option value="0" selected>不放入</option>
                <option value="1">第一個</option>
                <option value="2">第二個</option>
                <option value="3">第三個</option>
                <option value="4">第四個</option>
            </select>
        </div>

        <div class="row">
            <div class="col">
                <label for="describe">議題本文：</label>
            </div>
        </div>

        <div class="row">
            <textarea name="describe" id="describe" required>{{ $issue->describe }}</textarea>
        </div>

        <div class="row">
            <input type="submit" class="btn primary" value="修改議題" />
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