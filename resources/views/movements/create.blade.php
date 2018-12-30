@extends('layouts.app')

@section('content')
    <h1>Moviemiento Nuevo</h1>
    {!!
        Form::model(
            $movement = new \App\Movements(['money' => 0.00]),
            [
                'route' => 'movements.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('movements.partials.form')

    {!! Form::close() !!}
@endsection
