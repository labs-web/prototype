---
layout: default
chapitre: init-app
order: 11
---

# init-app

- créer un nouveau projet Laravel via Composer
```shell
    composer create-project laravel/laravel app
``` 

- Installation de laravel-ui-adminlte

```shell
composer require infyomlabs/laravel-ui-adminlte
```

- installation l'interfaces de auth

```shell
php artisan ui adminlte --auth
```

```shell
npm install && npm run dev
```
```shell
php artisan migrate
```

```shell
php artisan serve
```

- installation de package spatie/laravel-permission

```shell
 composer require spatie/laravel-permission
```

```shell
 php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```


- installation maatwebsite/excel 
```shell
composer require maatwebsite/excel
```
 - ajouté `Maatwebsite\Excel\ExcelServiceProvider::class,` dans config/app.php providers
 - ajouté `'Excel' => Maatwebsite\Excel\Facades\Excel::class,` dans config/app.php aliases


```shell
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
```
<!-- new slide -->