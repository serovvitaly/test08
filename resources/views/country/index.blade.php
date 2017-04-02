@extends('layout')

@section('title')Страны@endsection

@section('content')
    <h3>Страны</h3>
    <a href="/country/create">Добавить страну</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <th>{{ $item->id }}</th>
            <td>{{ $item->title }}</td>
            <td>
                <a href="/country/{{ $item->id }}/edit" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="/country/{{ $item->id }}" title="Удалить">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
@endsection