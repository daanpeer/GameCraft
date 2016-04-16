@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="header">Server {{ $server->name }}</div>

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
                    <tr>
                        <td>
                            <a href="{{ route('server.show', ['id' => $server->id])  }}">
                                {{$server->name}}
                            </a>
                        </td>
                        <td>{{$server->game}}</td>
                        <td>{{$server->ip}}</td>
                        <td>{{$server->status}}</td>
                    </tr>
                    </tbody>
                </table>

                <a href="{{ route('server.show', ['id'=> $server->id]) }}/resume" class="btn btn-default">
                    <i class="fa fa-play" aria-hidden="true"></i> Resume</a>
                <a href="{{ route('server.show', ['id'=> $server->id]) }}/pause" class="btn btn-default">
                    <i class="fa fa-pause" aria-hidden="true"></i> Pause</a>

                {!! Form::open(['action' => ['ServerController@destroy', $server->id], 'method' => 'delete']) !!}
                {!! Form::submit('Destroy', ['class'=>'btn btn-danger btn-mini']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
