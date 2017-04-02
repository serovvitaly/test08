@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Город - новый</h3>
            <form method="post" action="/city">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id or null }}">
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $title or null }}">
                </div>
                <div class="form-group">
                    <label for="country_id">Страна</label>
                    <select class="form-control" id="country_id" name="country_id">
                        <option></option>
                        @foreach($countries as $country)
                            <option
                                    @if(isset($country_id) and $country->id == $country_id) selected @endif
                            value="{{ $country->id }}"
                            >{{ $country->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/city" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection