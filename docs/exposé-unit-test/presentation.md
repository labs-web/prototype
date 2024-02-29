---
layout: presentation
order: 1
---

# Unit test

![unit-test](./images/unit_test.png){:width="900px"}*figure: Unit test*

<!-- new slide -->

# Unit Testing Laravel

![unit-test](./images/uni_test-laravel.png){:width="900px"}*figure: Unit Testing Laravel*

<!-- new slide -->

# Tests: Fonctionnels vs. Unitaires

![unit-test](./images/feature-unit-test-laravel.png){:width="900px"}*figure: tests fonctionnels et les tests unitaires*

<!-- new slide -->

# Création de tests

```shell
  php artisan make:test UserTest
```

```shell
  php artisan make:test UserTest --unit
```

<!-- new slide -->

# Exécution de tests

```shell
  ./vendor/bin/phpunit
```

```shell
  php artisan test
```

<!-- new slide -->

# Assertions disponibles

```shell
  $response->assertSuccessful();
```

```shell
  $response->assertStatus($code);
```

```shell
  $response->assertSee($value, $escaped = true);
```

```shell
  $response->assertDontSee($value, $escaped = true);
```

<!-- new slide -->

# Test de base de données

![unit-test](./images/Database.jpg){:width="900px"}*figure: Test de base de données*

<!-- new slide -->

## Réinitialisation de la base de données

![unit-test](./images/Resetting-database.png)*figure: Réinitialisation de la base de données*

<!-- new slide -->

## Available Assertions

```shell
  $this->assertDatabaseCount('users', 5);
```

```shell
  $this->assertDatabaseHas('users', [
    'email' => 'sally@example.com',
  ]);
```



```shell
  $this->assertDatabaseMissing('users', [
    'email' => 'sally@example.com',
  ]);
```


<!-- new slide -->

# Conclusion 
{:class="sectionHeader"}




