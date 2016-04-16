@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Server</div>

                    <div class="panel-body">
                        {{ Form::open(['action' => ['ServerController@store'], 'method' => 'post']) }}

                        <div class="form-group">

                            {{ Form::label('game', 'Game') }}
                            {{ Form::select('game', [
                                'minecraft' => 'Minecraft',
                                'factorio' => 'Factorio'
                            ], 'minecraft', ['class' => 'form-control']) }}

                        </div>

                        {{ Form::submit('Add Server!', ['class' => 'btn btn-primary']) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
