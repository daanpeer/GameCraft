@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="header">Hi</div>

            <div class="content">
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
@endsection
