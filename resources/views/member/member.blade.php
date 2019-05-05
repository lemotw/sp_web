@extends('app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>

    #member-panel{
        width: 90%;
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 20px;
        margin: 5em auto;
        padding: 2em;

        display: flex;
        flex-direction: column;
    }

    .row {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .member {
        width: 200px;
        padding: 1em;
        margin: 20px;
        border: 1px solid rgb(80,80,80);
        border-radius: 10px;
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .member >  h6 {
        width: 100%;
        color: #ffffff;
        text-align: left;
        border-bottom: 1px solid rgb(80,80,80);
    }

    .member > img {
        width: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .headline > h1 {
        color: #ffffff;
        border-bottom: 1px solid white;
    }

</style>

<section id="one" style="display:flex;">

    <div id="member-panel" class="container">

        <div class="headline">
            <h1>學生議會成員</h1>
            <hr>
        </div>

        <div class="row">
            @foreach($members as $member)
            <div class="member">
                <img src="{{ $member->img_link }}">
                <h6>姓名： {{ $member->name }}</h6>
                <h6>職稱： {{ $member->title }}</h6>
            </div>
            @endforeach
        </div>
    </div>

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