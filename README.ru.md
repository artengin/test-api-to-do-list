# Laravel API Project

API для управления задачами с аутентификацией.

## Возможности

- Регистрация, вход и выход пользователей
- Управление задачами (CRUD)

## Эндпоинты

### Аутентификация
- `POST api/register` - регистрация
- `POST api/login` - вход
- `POST api/logout` - выход (требует аутентификации)
- `POST api/logout-all` - выход со всех устройств (требует аутентификации)

### Задачи (v1, требуют аутентификации)
- `GET api/v1/tasks` - список задач
- `POST api/v1/tasks` - создать задачу
- `GET api/v1/tasks/{id}` - получить задачу
- `PUT/PATCH api/v1/tasks/{id}` - обновить задачу
- `DELETE api/v1/tasks/{id}` - удалить задачу

## Установка

1. Клонировать репозиторий
2. `composer install`
3. Настроить `.env` файл
4. `php artisan migrate`
5. `php artisan serve`