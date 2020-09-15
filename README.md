## Desafio Backend Wecont

A seguinte API foi desenvolvida utilizando Laravel 6.8 e tymon/jwt-auth 1.0.0-rc.5


### Como instalar:

rodar os seguintes comandos
```
git clone https://github.com/thiagomneves/desafiowecont.git
cd desafiowecont/
composer install
php artisan jwt:secret
```

é necessário informar as configurações de banco de dados no arquivo de ambiente.

```
php artisan migrate:fresh
php artidan db:seed
```

o banco de dados será populado com 2 usuários e algumas faturas para cada um.

 > usuário 1
- email: john@doe.com
- senha : 12345678

> usuário 2
- email: ze@mane.com
- senha : 123456
 

### Rotas

```
| POST      | api/auth/login              |                  |
| POST      | api/auth/logout             |                  |
| POST      | api/auth/me                 |                  |
| GET|HEAD  | api/invoices                | invoices.index   |
| POST      | api/invoices                | invoices.store   |
| GET|HEAD  | api/invoices/{invoice}      | invoices.show    |
| PUT|PATCH | api/invoices/{invoice}      | invoices.update  |
| DELETE    | api/invoices/{invoice}      | invoices.destroy |
```

