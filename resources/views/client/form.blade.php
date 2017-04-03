@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Клиент - новая</h3>
            <form method="post" action="/client/{{ $id or null }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id or null }}">
                <div class="form-group">
                    <label for="first_name">Имя*</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $first_name or null }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Фамилия*</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $last_name or null }}">
                </div>
                <div class="form-group">
                    <label for="city_id">Город*</label>
                    <select class="form-control" id="city_id" name="city_id">
                        <option></option>
                        @foreach($cities as $city)
                            <option
                                    @if(isset($city_id) and $city->id == $city_id) selected @endif
                            value="{{ $city->id }}"
                            >{{ $city->title }}</option>
                        @endforeach
                    </select>
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
                <div class="form-group">
                    <label for="currency_id">Валюта кошелька</label>
                    <p class="help-block small">Если указать валюту, то кошелек создастся автоматически.</p>
                    <select class="form-control" id="currency_id" name="currency_id">
                        <option></option>
                        @foreach($currencies as $currency)
                            <option
                                    @if(isset($currency_id) and $currency->id == $currency_id) selected @endif
                            value="{{ $currency->id }}"
                            >{{ $currency->code }} ({{ $currency->title }})</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/client" class="btn btn-link">Отмена</a>
            </form>
        </div>
    </div>
@endsection