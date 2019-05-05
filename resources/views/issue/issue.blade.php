@extends('app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
    #one {
        width: 100vw;
        min-height:100vh;
        padding: 3em;
        overflow: visible;

        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    #left {
        flex: 3;
        display: column;
        justify-content: space-between;
    }

    #right {
        flex: 1;
    }

    #reply {
        flex: 1;
        margin: 30px;
        display: flex;
        flex-direction: column;
    }

    .per-reply {
        flex: 1;
        border-left: 2px solid white;
        padding: 1em;
        color: white;
        margin: 10px;
    }

    .content {
        color: white;
    }

</style>

<section id="one">

    <div id="left">
        <h1>{{ $issue->title }}</h1>

        <div class="content">
            @php
                echo $issue->describe;
            @endphp
        </div>

        <h5>時間: {{ $issue->created_at }}</h5>

        <div id="reply">
            @foreach($issue->answer as $answer)
                <div class="per-reply">
                    @php
                        echo $answer->reply;
                    @endphp
                </div>
            @endforeach
        </div>

    </div>

    <div id="right"></div>

</section>

@endsection