@extends('layout')

@section('title')Котировки валют@endsection

@section('content')
    <h3>Котировки валют</h3>
    <a href="/quote/create">Добавить ставку валюты</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Валютная пара</th>
            <th>Ставка</th>
            <th>Дата</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->fromCurrency->code }}/{{ $item->toCurrency->code }}</td>
                <td>{{ $item->rate }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="/quote/{{ $item->id }}/edit" title="Редактировать">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="/quote/{{ $item->id }}" title="Удалить">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ $items->links() }}
    </table>
@endsection