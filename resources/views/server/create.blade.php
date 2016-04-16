@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="header">New Server</div>

            <div class="content">
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
@endsection
