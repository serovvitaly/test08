### Задание:
Необходимо разработать веб-приложение простой платежной системы. 

### Требования:
1) В системe клиент соотносится с "кошельком", содержащим денежные средства в некой валюте. Сохраняется информация о имени клиента, стране и городе его регистрации, валюте кошелька и остатке средств на нем.
2) Клиенты могут делать друг другу денежные переводы в валюте получателя или валюте отправителя.
3) Сохраняется информация о всех операциях на кошельке клиента.
4) В системе существует информация о курсах валют (для всех зарегистрированных кошельков) к USD на каждый день.
5) Проект представляет из себя 2 основных части - HTTP API и страница с отчетом.
6) HTTP API должен представлять следующие интерфейсы:
- регистрация клиента с указанием его имени, страны, города регистрации, валюты создаваемого кошелька.
- зачисление денежных средств на кошелек клиента
- перевод денежных средств с одного кошелька на другой.
- загрузка котировки валюты к USD на дату
7) Отчет должен отображать историю всех операций по кошельку указанного клиента за период.
- Параметры: Имя клиента (обязательный параметр), Начало периода (необязательный параметр), конец периода (необязательный параметр).
- Необходимо также вывести общую сумму операций по счету за период в USD и валюте счета
- Должна быть предусмотрена возможность скачивания результатов отчета в файл (например, в CSV или XML формате).

### Примечания:
1) Авторизация/аутентификация на любой из частей сайта не обязательна. Все данные о пользователях, там, где это нужно, могут приходить в теле запроса одним из параметров.
2) При решении должна использоваться реляционная СУБД.


### Инфрастрактура

Проект ренализовани на laravel 5.4, Postgresql, jQuery, Bootstrap, PHP.

Для разраьботки и тестирования, использовался PHP7, но теоретически должно запуститься и на PHP 5.6.

Для удобства, в корень проекта помещены: composer.phar и phpunit.phar


### Развертывание

Для успешной установки. требуется готовая база данных:

database = test_payment_system

username = postgres

password = 123

...если хотите использовать свои настройки БД, то их можно указать прямо в конфиге
config/database.php (параметры перенесены из файла .env, что бы не зависить от окружения)

git clone git@github.com:serovvitaly/test08.git

composer install

php artisan StartApp


### Прочее

Основная работа с API выполнена стандартными средствами larave: модели, контроллеры, миграции и т.п.

Часть кода вынесена в домен, на сколько хватило времени.
 
Был замысел реализовать фронт на react, но не хватило времени.

Как сказано в задании - не стал "вылизывать". Обозначил основныем моменты, и все привел в рабочее состояние.

Могут быть некоторые баги, например записи не удаляются и не редактирутся, это элементарно фиксится, но это опять же время.

Думаю того что есть, вполне достаточно для оценки.

С уважение, Виталий Серов.
