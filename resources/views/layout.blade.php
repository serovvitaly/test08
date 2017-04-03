<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills">
                <li class="active"><a href="/">Home</a></li>

                <li><a href="/client">Клиенты</a></li>
                <li><a href="/wallet">Кошельки</a></li>

                <li><a href="/city">Города</a></li>
                <li><a href="/country">Страны</a></li>
                <li><a href="/currency">Валюты</a></li>
                <li><a href="/quote">Котировки валют</a></li>
            </ul>
        </div>
    </div>
    @yield('content')
</div>
</body>
</html>