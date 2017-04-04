var TopMenu = React.createClass({
    render: function() {
        return (
            <ul className="nav nav-pills">
                <li className="active"><a href="/">Home</a></li>

                <li><a href="/client">Клиенты</a></li>
                <li><a href="/wallet">Кошельки</a></li>

                <li><a href="/city">Города</a></li>
                <li><a href="/country">Страны</a></li>
                <li><a href="/currency">Валюты</a></li>
                <li><a href="/quote">Котировки валют</a></li>

            <li><a href="/transaction"><strong>Транзакции</strong></a></li>
                <li><a href="/transaction/replenish" className="btn btn-success btn-sm">Пополнить кошелек</a></li>
            <li><a href="/transaction/transfer" className="btn btn-danger btn-sm">Сделать перевод</a></li>
            </ul>
        );
    }
});


ReactDOM.render(
    <TopMenu />,
    document.getElementById('TopMenuContainer')
);
