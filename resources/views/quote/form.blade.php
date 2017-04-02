@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Котировка валюты - новая</h3>
            <form method="post" action="/quote/{{ $id or null }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id or null }}">
                <div class="form-group">
                    <label for="from_currency_id">Первая валюта</label>
                    <select class="form-control" id="from_currency_id" name="from_currency_id">
                        <option></option>
                        @foreach($currencies as $currency)
                            <option
                                    @if(isset($from_currency_id) and $currency->id == $from_currency_id) selected @endif
                            value="{{ $currency->id }}"
                            >{{ $currency->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="to_currency_id">Вторая валюта</label>
                    <select class="form-control" id="to_currency_id" name="to_currency_id">
                        <option></option>
                        @foreach($currencies as $currency)
                            <option
                                    @if(isset($to_currency_id) and $currency->id == $to_currency_id) selected @endif
                            value="{{ $currency->id }}"
                            >{{ $currency->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rate">Ставка</label>
                    <input type="text" class="form-control" id="rate" name="rate" value="{{ $rate or null }}">
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/quote" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection