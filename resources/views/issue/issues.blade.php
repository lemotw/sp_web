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
        width: 80%;
        height: 100%;
        flex: 1;
        display: flex;
        flex-direction: row;
    }

    #left {
        flex: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #issue-container {
        flex: 1;
        display: flex;
        flex-direction: column;

        height: 100%;
        overflow-y: auto;

        margin-top: 3em;
        margin-right: 2em;
        padding: 1em;
    }
    
    .row {
        height: 2em;
        margin: 2px;
        border-radius: 5px;
        display: block;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .row:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .row > h5 {
        line-height: 2em;
        width: 60px;
        display: inline-block;
    }

    .row > p {
        width: calc(100% - 70px);
        display: inline-block;
        color: white;
        line-height: 2em;
        padding: 0;
        white-space: nowrap;
        text-overflow: ellipsis;
    }



    #right {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #function-bar {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 90%;
    }

    #search-form {
        display: flex;
        flex-direction: column;
    }

    #new-one > h4 {
        display: inline-block;
        width: 60%;
    }

    #new-one > a {
        display: inline-block;
        width: 38%;
        text-decoration: none;
        color: white;
    }

    @media screen and (max-width: 500px){
        #one {
            padding: 0;
            padding-top: 3em;
        }

        .container {
            flex-direction: column-reverse;
        }

        #search {
            margin-top: 20px;
        }

        #search > h1 {
            display: none;
        }
    }
</style>

<section id="one">

    <div class="container">

        <div id="left">

            <div id="issue-container">
                @php
                    $counter = 1;
                @endphp
                <!-- repeat field -->
                @foreach($issues as $issue)
                    <a href="/issue/id/{{$issue->id}}"><div class="row"><h5>{{ $counter }}</h5> <p>{{ $issue->title }}</p></div></a>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </div>
        </div>

        <div id="right">
            <div id="function-bar">
                <h4>議題檢索</h4>

                <div id="search">
                    <h1>搜尋</h1>
                    <form action="{{ route('issue_search') }}" method="POST" id="search-form">
                        @csrf
                        <input type="text" name="search" style="color:#ffffff">
                        <input type="submit" value="搜尋">
                    </form>
                </div>

                <div id="new-one">
                    <h4>Solve your problem?</h4>
                    <a href="/issue/add" class="button">new</a>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection