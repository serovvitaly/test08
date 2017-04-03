@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Кошелек - новый</h3>
            <form method="post" action="/wallet">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id or null }}">
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $title or null }}">
                </div>
                <div class="form-group">
                    <label for="client_id">Клиент</label>
                    <select class="form-control" id="client_id" name="client_id">
                        <option></option>
                        @foreach($clients as $client)
                            <option
                                    @if(isset($client_id) and $client->id == $client_id) selected @endif
                            value="{{ $client->id }}"
                            >{{ $client->full_name() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="currency_id">Валюта</label>
                    <select class="form-control" id="currency_id" name="currency_id">
                        <option></option>
                        @foreach($currencies as $currency)
                            <option
                                    @if(isset($currency_id) and $currency->id == $currency_id) selected @endif
                            value="{{ $currency->id }}"
                            >{{ $currency->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/wallet" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection