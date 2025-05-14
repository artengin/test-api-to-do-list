# Laravel API Project

API for task management with authentication.

## Features

- User registration, login, and logout
- Task management (CRUD)

## Endpoints

### Authentication
- `POST api/register` - register
- `POST api/login` - login
- `POST api/logout` - logout (requires authentication)
- `POST api/logout-all` - logout from all devices (requires authentication)

### Tasks (v1, requires authentication)
- `GET api/v1/tasks` - list tasks
- `POST api/v1/tasks` - create task
- `GET api/v1/tasks/{id}` - get task
- `PUT/PATCH api/v1/tasks/{id}` - update task
- `DELETE api/v1/tasks/{id}` - delete task

## Installation

1. Clone the repository
2. `composer install`
3. Configure `.env` file
4. `php artisan migrate`
5. `php artisan serve`