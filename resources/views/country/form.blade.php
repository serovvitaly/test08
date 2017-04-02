@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Страна - новая</h3>
            <form method="post" action="/country/{{ $id or null }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id or null }}">
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $title or null }}">
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/country" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection