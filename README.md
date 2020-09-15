## Desafio Backend Wecont

A seguinte API foi desenvolvida utilizando Laravel 6.8 e tymon/jwt-auth 1.0.0-rc.5


### Como instalar:

rodar os seguintes comandos
```
git clone https://github.com/thiagomneves/desafiowecont.git
composer install
```

é necessário informar as configurações de banco de dados no arquivo de ambiente.

 

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

