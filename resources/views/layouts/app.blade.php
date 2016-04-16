<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Operation GameCraft</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet"/>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
<div class="wrapper">
    <div class="sidebar" data-color="azure">
        <div class="logo">
            <a href="/" class="logo-text">
                Operation Gamecraft
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url(route('server.index')) }}">Servers</a></li>
                <li><a href="{{ url(route('server.create')) }}">New Server</a></li>
            </ul>
        </div>
    </div>
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="cdf52142-d12f-b510-6f70-206d547e76d8">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @foreach (Alert::getMessages() as $type => $messages)
                    @foreach ($messages as $message)
                        <div class="alert alert-{{ $type }}">{{ $message }}</div>
                    @endforeach
                @endforeach

                @yield('content')


            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Heya! You are awesome!
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    © 2016
                </p>
            </div>
        </footer>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
