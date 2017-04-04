@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Пополнение кошелька</h3>
            <form method="post" action="/transaction/replenish">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="wallet_id">Кошелек</label>
                    <select class="form-control" id="wallet_id" name="wallet_id">
                        <option></option>
                        @foreach($wallets as $wallet)
                            <option value="{{ $wallet->id }}">
                                {{ $wallet->client->full_name() }} -
                                {{ $wallet->title }} -
                                {{ $wallet->currency->code }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="currency_id">Валюта</label>
                    <select class="form-control" id="currency_id" name="currency_id">
                        <option></option>
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ $currency->code }} ({{ $currency->title }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Сумма</label>
                    <input type="text" class="form-control" id="amount" name="amount">
                </div>
                <button type="submit" class="btn btn-success">Выполнить</button>
                <a href="/transaction" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection