@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-borde">
        <thead>
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Category</th>
            <th>Amout</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movements as $movement)
            <tr>
                <td>{{ $movement->movement_date }}</td>
                <td>{{ $movement->type }}</td>
                <td>{{ $movement->category->name }}</td>
                <td>{{ number_format($movement->money_decimal,2) }}</td>
                <td>
                    <a href="{{ route('movements.show',$movement) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('movements.edit', $movement) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center">
        @if(Request::get('type'))
            {!! $movements->appends('type', Request::get('type'))->links() !!}
        @else
            {!! $movements->links() !!}
        @endif
    </div>
@endsection
