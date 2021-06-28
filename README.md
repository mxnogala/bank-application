# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Przed uruchomieniem:

1. utwórz plik .env( jeśli nie ma to skopiować z .env.example), nadaj nazwę hosta, nazwe bazy danych, użytkownika oraz hasło
2. zainstaluj paczki `composer install`, `composer require laravel/passport`
3. utwórz migrację bazy danych `php artisan migrate`
    - tworzenie danych testowych `php artisan migrate:refresh --seed`
4. utwórz specjalny klucz autoryzacji aplikacji `php artisan key:generate`
5. utwórz klucze szyfrowanie, potrzebne do generowania tokenów `php artisan passport:install`
