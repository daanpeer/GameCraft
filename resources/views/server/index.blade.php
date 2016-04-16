@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="header">Server list</div>

            <div class="content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Game</th>
                        <th>Ip</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servers as $server)
                        <tr>
                            <td>
                                <a href="{{ route('server.show', ['id' => $server->id])  }}">
                                    {{$server->name}}
                                </a>
                            </td>
                            <td>
                                @if($server->game == 0)
                                    Factorio
                                @else
                                    Minecraft
                                @endif
                            </td>
                            <td>{{$server->ip}}</td>
                            <td>{{status_code_to_name($server->status)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
