@extends('layouts.app')

@section('content')
    <h1>Edit of movement {{ $movement->id }}</h1>
    {!! Form::model(
        $movement,
        [
            'route' => ['movements.update',$movement],
            'files' => 'true',
            'method' => 'PUT'
        ]
    ) !!}

        @include('movements.partials.form')

    {!! Form::close() !!}
@endsection
