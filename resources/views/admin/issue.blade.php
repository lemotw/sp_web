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
        border-left: 2px solid white;
        padding: 1em;
        color: white;
        margin: 10px;
    }

    .checked {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .reply-update > a{
        color: white;
        text-decoration: none;
        align-items: center;
        justify-content: center;
    }

    .content {
        color: white;
    }

    .info-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .down-right > a {
        color: #ffffff;
        text-decoration: none;
    }

</style>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.per-reply').click(
            function() {
                var ch = $(this).children('.ckbox');

                if(ch.prop('checked'))
                    $(this).removeClass('checked');
                else
                    $(this).addClass('checked');
                ch.prop('checked', !ch.prop('checked'));
            }
        );
    });
</script>

<section id="one">

    <div id="left">
        <h1>{{ $issue->title }}</h1>

        <div class="content">
            @php
                echo $issue->describe;
            @endphp
        </div>

        <div class="info-bar">
            <h5>時間: {{ $issue->created_at }}</h5>
            <div class="down-right">
                <a href="{{ route('show_issue_reply', ['id'=>$issue->id]) }}">回覆</a>
                <a href="{{ route('show_issue_update', ['id'=>$issue->id]) }}">更新</a>
            </div>
        </div>

        <div id="reply">
            <form action="{{ route('delete_reply') }}" method="POST">
            @csrf
            <input type="hidden" name="issue_id" value="{{ $issue->id }}">
            <h4> 回覆刪除： <input type="submit" value="刪除"> </h4>
            @foreach($issue->answer as $answer)
                <div class="per-reply">
                    <input type="checkbox" name="ch[]" class="ckbox" value="{{ $answer->id }}" hidden>
                    <div class="reply-content">
                     @php
                        echo $answer->reply;
                    @endphp
                    </div>
                    <div class="reply-update">
                        <a href="{{ route('show_reply_update', ['id'=>$answer->id]) }}">更新</a>
                    </div>
                </div>
            @endforeach
            </form>
        </div>

    </div>

    <div id="right"></div>

</section>

@endsection