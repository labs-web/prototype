---
layout: rapport
order: 1
---


# Unit test

![unit-test](./images/unit_test.png){:width="900px"}

<!-- note -->

Les tests unitaires sont une technique de test logiciel dans laquelle des unités ou composants individuels d'une application logicielle sont testés isolément pour garantir qu'ils se comportent comme prévu. Dans ce contexte, une « unit » fait généralement référence à la plus petite partie testable d'une application, telle qu'une fonction, une méthode ou une classe.


## Unit Testing in Laravel

Laravel, étant un framework PHP moderne et largement utilisé, met l'accent sur les tests et inclut un support robuste pour PHPUnit, qui est un framework de test populaire pour les applications PHP. Voici une analyse plus approfondie de la prise en charge intégrée de Laravel pour PHPUnit :

- PHPUnit Intégration : 
  - Laravel est préinstallé avec PHPUnit en tant que dépendance, ce qui le rend facilement disponible pour écrire et exécuter des tests dans les applications Laravel.

- Testing Structure :
  - Laravel fournit un répertoire structuré pour les tests dans le répertoire `tests` de votre application.


- Commandes artisanales pour les tests :
  - Les développeurs peuvent utiliser des commandes telles que `php artisan test` pour exécuter tous les tests au sein de l'application, ou `php artisan test --filter` pour exécuter des tests ou des cas de test spécifiques.


## Différence entre les tests fonctionnels et les tests unitaires

### Test fonctionel

- Les tests fonctionnels testent les fonctionnalités de base de l’application. Il vérifie si l'application s'exécute conformément aux exigences de l'entreprise. Vous devez lire et comprendre les exigences opérationnelles d'une application avant de commencer à rédiger les cas de tests fonctionnels et à tester l'application.

```shell
    php artisan make:test example-test
```

### Unit Testing

- Les tests unitaires testent des éléments individuels d’une application. Chaque élément, comme une zone de texte, un bouton et un affichage de texte, est testé pour vérifier s'il effectue les actions attendues. Ces éléments individuels sont appelés « Unités », ce qui a donné naissance au terme Unit Testing. Il est exécuté même sur le plus petit élément d’une application.

```shell
    php artisan make:test example-test --unit
```


## Meilleures pratiques pour rédiger des tests unitaires efficaces dans Laravel

