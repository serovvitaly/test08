@extends('layout')

@section('title')Клиенты@endsection

@section('content')
    <h3>Клиенты</h3>
    <a href="/client/create">Добавить клиента</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя клиента</th>
            <th>Город</th>
            <th>Страна</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <th>{{ $item->id }}</th>
            <td>{{ $item->full_name() }}</td>
            <td>{{ $item->city->title }}</td>
            <td>{{ $item->country->title }}</td>
            <td>
                <a href="/client/{{ $item->id }}/edit" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="/client/{{ $item->id }}" title="Удалить">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
@endsection