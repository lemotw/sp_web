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
        flex: 2;
        display: flex;
        flex-direction: column;
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
        display: flex;
        flex-direction: column;
    }

    .content > form {
        margin-left: 1em;
    }

    .row {
        flex: 1;
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
    }

    .row > h4 {
        width: 150px;
        line-height: 2em;
        padding: 0;
        margin: 0;
    }

    .row > input {
        width: calc(100% - 150px);
    }

</style>

<section id="one">

    <div id="left">
        <h1>Admin Register</h1>

        <div class="content">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row"><h4>名字：</h4><input type="text" name="name" required></div>
                <div class="row"><h4>帳號：</h4><input type="text" name="user" required></div>
                <div class="row"><h4>密碼：</h4><input type="password" name="password" required></div>
                <input type="submit" value="Register" style="margin-top: 10px;"/>
            </form>
        </div>
    </div>

    <div id="right"></div>

</section>

@endsection