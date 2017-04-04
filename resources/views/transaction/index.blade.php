@extends('layout')

@section('title')Котировки валют@endsection

@section('content')
    <h3>Транзакции</h3>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Клиент</th>
            <th>Кошелек</th>
            <th>Операция</th>
            <th>Валюта</th>
            <th>Сумма</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->client->full_name() }}</td>
                <td>{{ $item->wallet->title }}</td>
                <td>{{ $item->getType() }}</td>
                <td>{{ $item->currency->code }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
        {{ $items->links() }}
    </table>
@endsection