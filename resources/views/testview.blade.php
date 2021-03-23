<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Welcome to Chat</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome to Chat</h1>
        </div>
        <div class="form-group col-md-6">
            <form id="message-form" action="{{ route('send-message') }}" method="post" class="form">
                 {{ csrf_field() }}

                <textarea class="form-control" name="message" id="message" cols="5" rows="2"></textarea>
                <button class="btn btn-primary submit" value="OK" name="submit" type="submit">Send</button>
            </form>
        </div>
        <div class="col-md-6 chat">
            <p class="new-message"><b>hello</b></p>
            <p class="test"></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js')}}" ></script>
<script src="{{ asset('js/autobahn.js') }}"></script>
<script src="{{ asset('js/subscribed.js') }}"></script>
<script src="{{ asset('js/send-message.js') }}"></script>
{{--<script src="js/subscribed.js"></script>--}}
{{--<script src="js/send-message.js"></script>--}}

</body>
</html>
