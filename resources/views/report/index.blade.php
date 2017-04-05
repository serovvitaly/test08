@extends('layout')

@section('title')Отчет@endsection

@section('content')
    <h3>Отчет по операциям</h3>
    <table class="table">
        <tr>
            <th>Клиент:</th>
            <td>{{ $client->full_name() }}</td>
        </tr>
        <tr>
            <th>Кошелек:</th>
            <td>{{ $wallet->title }} -  {{ $wallet->currency->code }}</td>
        </tr>
        <tr>
            <th>Сумма операций, USD:</th>
            <td>{{ $usd_total_sum }}</td>
        </tr>
        <tr>
            <th>Сумма операций, {{ $wallet->currency->code }}:</th>
            <td>{{ $total_sum }}</td>
        </tr>
        @if($fromDate)
        <tr>
            <th>Начало периода:</th>
            <td>{{ $fromDate }}</td>
        </tr>
        @endif
        @if($toDate)
        <tr>
            <th>Конец периода:</th>
            <td>{{ $toDate }}</td>
        </tr>
        @endif
    </table>
    <a href="/transaction/report?wallet_id={{ $wallet->id }}&from_date={{ $fromDate }}&to_date={{ $toDate }}&format=csv"
       class="btn btn-sm btn-primary"
    >Экспорт CSV</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
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
                <td>{{ $item->getType() }}</td>
                <td>{{ $item->currency->code }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection