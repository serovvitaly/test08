<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-lg-12" id="TopMenuContainer">
            <ul class="nav nav-pills">
                <li class="active"><a href="/">Home</a></li>

                <li><a href="/client">Клиенты</a></li>
                <li><a href="/wallet">Кошельки</a></li>

                <li><a href="/city">Города</a></li>
                <li><a href="/country">Страны</a></li>
                <li><a href="/currency">Валюты</a></li>
                <li><a href="/quote">Котировки валют</a></li>

                <li><a href="/transaction"><strong>Транзакции</strong></a></li>
                <li><a href="/transaction/replenish" class="btn btn-success btn-sm">Пополнить кошелек</a></li>
                <li><a href="/transaction/transfer" class="btn btn-danger btn-sm">Сделать перевод</a></li>
            </ul>
        </div>
        <div class="col-lg-12" id="ContentContainer"></div>
    </div>
    @yield('content')
</div>
{{--<script src="https://unpkg.com/react@15/dist/react.js"></script>
<script src="https://unpkg.com/react-dom@15/dist/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
<script type="text/babel" src="/react/app.js"></script>--}}
<script src="/js/app.js?1"></script>
</body>
</html>