@extends('layout')

@section('title')Города@endsection

@section('content')
    <h3>Города</h3>
    <a href="/city/create">Добавить город</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Страна</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->country->title }}</td>
                <td>
                    <a href="/city/{{ $item->id }}/edit" title="Редактировать">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="/city/{{ $item->id }}" title="Удалить">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ $items->links() }}
    </table>
@endsection