@extends('app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>

    a {
        color: rgba(0, 0, 0, 0);
    }

    #one {
        width: 100vw;
        height: 100vh;
        padding: 3em;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        height: 100%;
        flex: 1;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .container > a {
        width: 30%;
        height:40%;
        color: rgba(0, 0, 0, 0);
    }

    .panel {
        width: 100%;
        height: 100%;
        color: white;
        border: 3px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .panel:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .panel > h4 {
        font-weight: bold;
    }

</style>

<section id="one">

    <div class="container">

        <a href="{{ route('show_delete_panel') }}">
            <div class="panel">
                <h4>刪除管理</h4>
            </div>
        </a>
       
        <a href="{{ route('show_maintain_panel') }}">
            <div class="panel">
                <h4>維護&回覆</h4>
            </div>
        </a>

        <a href="{{ route('show_member_panel') }}">
            <div class="panel">
                <h4>成員管理</h4>
            </div>
        </a>

    </div>

</section>

@endsection