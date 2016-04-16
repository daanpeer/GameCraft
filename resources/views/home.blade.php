@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hi</div>

                    <div class="panel-body">
                        Available games:
                        <ul>
                            <li>Minecraft</li>
                            <li>Factorio</li>
                        </ul>

                        Commands:
                    <pre>/gamecraft start {game}
/gamecraft stop {game}
/gamecraft resume {game}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
