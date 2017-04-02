@extends('layout')

@section('title')Валюты@endsection

@section('content')
    <h3>Валюты</h3>
    <a href="/currency/create">Добавить валюту</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Код</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->code }}</td>
                <td>
                    <a href="/currency/{{ $item->id }}/edit" title="Редактировать">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="/currency/{{ $item->id }}" title="Удалить">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ $items->links() }}
    </table>
@endsection