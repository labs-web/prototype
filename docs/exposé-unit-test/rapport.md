---
layout: default
order: 1
---

# Table de matière

# Unit test

![unit-test](./images/unit_test.png){:width="900px"}*figure: Unit test*



Les tests unitaires sont une technique de test de logiciels dans laquelle des unités ou des composants individuels d'une application logicielle sont testés isolément pour garantir qu'ils fonctionnent correctement conformément à leurs spécifications. Dans les tests unitaires, chaque unité du logiciel est testée indépendamment des autres unités pour valider que son code fonctionne comme prévu, en respectant la conception et les exigences.


# Unit Testing Laravel

![unit-test](./images/uni_test-laravel.png){:width="900px"}*figure: Unit Testing Laravel*

Laravel est conçu en pensant aux tests. En fait, la prise en charge des tests avec PHPUnit est incluse dès le départ et un fichier phpunit.xml est déjà configuré pour votre application. Le framework est également livré avec des méthodes d'assistance pratiques qui vous permettent de tester de manière expressive vos applications.

Par défaut, le répertoire tests de votre application contient deux répertoires : Feature et Unit. Les tests unitaires sont des tests qui se concentrent sur une très petite partie isolée de votre code. Les tests dans votre répertoire de test « Unit » ne démarrent pas votre application Laravel et ne peuvent donc pas accéder à la base de données de votre application ou à d'autres services de framework.

# Tests: Fonctionnels vs. Unitaires

![unit-test](./images/feature-unit-test-laravel.png){:width="900px"}*figure: tests fonctionnels et les tests unitaires*

### Test fonctionel

- Les tests fonctionnels testent les fonctionnalités de base de l’application. Il vérifie si l'application s'exécute conformément aux exigences de l'entreprise. Vous devez lire et comprendre les exigences opérationnelles d'une application avant de commencer à rédiger les cas de tests fonctionnels et à tester l'application.


### Unit Testing

- Les tests unitaires testent des éléments individuels d’une application. Chaque élément, comme une zone de texte, un bouton et un affichage de texte, est testé pour vérifier s'il effectue les actions attendues. Ces éléments individuels sont appelés « Unités », ce qui a donné naissance au terme Unit Testing. Il est exécuté même sur le plus petit élément d’une application.


# Création de tests

Pour créer un nouveau scénario de test, utilisez la commande `make:test` Artisan. Par défaut, les tests seront placés dans le répertoire `tests/Feature `:

```shell
  php artisan make:test UserTest
```

Si vous souhaitez créer un test dans le répertoire `tests/Unit`, vous pouvez utiliser l'option `--unit` lors de l'exécution de la commande `make:test` :


```shell
  php artisan make:test UserTest --unit
```


# Exécution de tests

Comme mentionné précédemment, une fois que vous avez écrit des tests, vous pouvez les exécuter en utilisant phpunit :

```shell
  ./vendor/bin/phpunit
```

En plus de la commande phpunit, vous pouvez utiliser la commande test Artisan pour exécuter vos tests. Le lanceur de tests Artisan fournit des rapports de tests détaillés afin de faciliter le développement et le débogage :


```shell
  php artisan test
```



## Assertions disponibles

### Assertions de réponse

La classe `Illuminate\Testing\TestResponse` de Laravel fournit une variété de méthodes d'assertion personnalisées que vous pouvez utiliser lors du test de votre application. Ces assertions sont accessibles sur la réponse renvoyée par les méthodes de test `json`, `get`, `post`, `put` et `delete`:


- assertSuccessful
Affirmez que la réponse a un code d'état HTTP réussi (>= 200 et < 300) :

```shell
  $response->assertSuccessful();
```

- assertStatus
Affirmez que la réponse a un code d'état HTTP donné :

```shell
  $response->assertStatus($code);
```
- assertSee
Affirmez que la chaîne donnée est contenue dans la réponse. Cette assertion échappera automatiquement à la chaîne donnée, sauf si vous transmettez un deuxième argument false :

```shell
  $response->assertSee($value, $escaped = true);
```

- assertDontSee
Affirmez que la chaîne donnée n'est pas contenue dans la réponse renvoyée par l'application. Cette assertion échappera automatiquement à la chaîne donnée, sauf si vous transmettez un deuxième argument false :

```shell
  $response->assertDontSee($value, $escaped = true);
```


# Test de base de données


![unit-test](./images/Database.jpg){:width="900px"}*figure: Test de base de données*

Laravel fournit une variété d'outils et d'assertions utiles pour faciliter le test de vos applications basées sur des bases de données. De plus, les usines de modèles et les seeders Laravel facilitent la création d'enregistrements de base de données de test à l'aide des modèles et des relations Eloquent de votre application.


## Réinitialisation de la base de données

Le trait `Illuminate\Foundation\Testing\RefreshDatabase` ne migre pas votre base de données si votre schéma est à jour. Au lieu de cela, il exécutera uniquement le test dans le cadre d'une transaction de base de données. Par conséquent, tous les enregistrements ajoutés à la base de données par des scénarios de test qui n'utilisent pas cette caractéristique peuvent toujours exister dans la base de données.

Si vous souhaitez réinitialiser totalement la base de données, vous pouvez utiliser les traits `Illuminate\Foundation\Testing\DatabaseMigrations` ou `Illuminate\Foundation\Testing\DatabaseTruncation` à la place. Cependant, ces deux options sont nettement plus lentes que le trait `RefreshDatabase`.


## Available Assertions

Laravel fournit plusieurs assertions de base de données pour vos tests de fonctionnalités `PHPUnit`.

- assertDatabaseCount
Affirmez qu'une table de la base de données contient le nombre d'enregistrements donné :

```shell
  $this->assertDatabaseCount('users', 5);
```

- assertDatabaseHas
Affirmer qu'une table de la base de données contient des enregistrements correspondant aux contraintes de requête clé/valeur données :

```shell
  $this->assertDatabaseHas('users', [
    'email' => 'sally@example.com',
  ]);
```

- assertDatabaseMissing
Affirmer qu'une table de la base de données ne contient pas d'enregistrements correspondant aux contraintes de requête clé/valeur données :

```shell
  $this->assertDatabaseMissing('users', [
    'email' => 'sally@example.com',
  ]);
```


# Conlusion

Les tests sont un élément crucial du développement logiciel, garantissant que chaque composant fonctionne comme prévu et que l'ensemble de l'application répond aux exigences fonctionnelles et de performance. Dans cet exposé, nous avons exploré deux types de tests principaux dans le contexte de Laravel : les tests fonctionnels et les tests unitaires.

En somme, la combinaison de tests fonctionnels et unitaires avec une gestion efficace de la base de données permet aux développeurs Laravel de garantir la qualité, la fiabilité et la performance de leurs applications tout au long du processus de développement. Ces pratiques contribuent à la création de logiciels robustes et évolutifs qui répondent aux attentes des utilisateurs et des clients.

