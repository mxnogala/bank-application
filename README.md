# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Przed uruchomieniem:

1. utwórz plik .env( jeśli nie ma to skopiować z .env.example), nadaj nazwę hosta, nazwe bazy danych, użytkownika oraz hasło
1. zainstaluj paczki `composer install`
1. utwórz migrację bazy danych `php artisan migrate`
    - tworzenie danych testowych `php artisan migrate:refresh --seed`
1. tworzenie specjalnego klucza autoryzacji aplikacji `php artisan key:generate`
