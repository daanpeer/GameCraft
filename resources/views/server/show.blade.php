@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Server {{$server->id}}</div>

                    <div class="panel-body">
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

                        <a href="" class="btn btn-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
