@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>Сгенерировать отчет</h3>
            <form method="post" action="/transaction/report">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="wallet_id">Кошелек</label>
                    <select class="form-control" id="wallet_id" name="wallet_id">
                        <option></option>
                        @foreach($wallets as $wallet)
                            <option
                            value="{{ $wallet->id }}"
                            >{{ $wallet->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="from_date">Начало периода</label>
                    <input type="text" name="from_date" id="from_date" class="datepicker form-control">
                </div>
                <div class="form-group">
                    <label for="to_date">Окончание периода периода</label>
                    <input type="text" name="to_date" id="to_date" class="datepicker form-control">
                </div>
                <button type="submit" class="btn btn-success">Сгенерировать</button>
            </form>
        </div>
    </div>
@endsection