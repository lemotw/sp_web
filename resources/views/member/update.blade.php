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
    <form action="{{ route('update_member') }}" method="POST">
    @csrf
        <input type="hidden" name="id" value="{{ $member->id }}">

        <div class="row">
            <h2>修改成員資訊</h2>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <label for="title">成員姓名：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="name" value="{{ $member->name }}" required>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="title">成員頭銜：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="title" value="{{ $member->title }}" required>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="title">圖片連結：</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="img_link" value="{{ $member->img_link }}" required>
                <hr>
            </div>
        </div>

        <div class="row">
            <input type="submit" class="btn primary" value="成員修改" />
        </div>

    </div>
    </form>

</section>
@endsection