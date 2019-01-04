@extends('layouts.app')

@section('content')
    <h1>Detalle del movimiento {{ $movement->id }}</h1>
    <table class="table table-borde">
        <tr>
            <th>
                Type
            </th>
            <td>{{ $movement->type }} </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $movement->movement_date }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $movement->category->name }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ number_format($movement->monay_decimal), 2 }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $movement->description }}</td>
        </tr>
    </table>

    @if($movement->image)
        <a href="{{asset($movement->image)}}" class="img-thumbnail" target="_blank">
            <img src="{{asset($movement->image)}}" alt="recibo">
        </a>
    @endif
@endsection
