# Name space

## Introduction

<!-- image name space -->
Les espaces de noms sont des qualificatifs qui résolvent deux problèmes différents :

1. Ils permettent une meilleure organisation en regroupant les classes qui travaillent ensemble pour effectuer une tâche
2. Ils permettent d’utiliser le même nom pour plus d’une classe.

Par exemple, vous pouvez avoir un ensemble de classes qui décrivent un tableau HTML, comme Tableau, Ligne et Cellule tout en ayant également un autre ensemble de classes pour décrire les meubles, tels que Table, Chaise et Lit. Les espaces de noms peuvent être utilisés pour organiser les classes en deux groupes différents tout en empêchant les deux classes Table et Table d’être mélangées.

## Déclarer un namespace
```bash
<?php
namespace Projets;
?>
```
- Une déclaration d'espace de noms doit être la première chose dans le fichier PHP. Le code suivant serait invalide :
<!-- image Syntax error -->

## Pour une organisation plus poussée
Pour une organisation plus poussée, il est possible d'avoir des espaces de noms imbriqués :
Déclarez un espace de noms appelé Html dans un espace de noms appelé Code :
```bash
<?php
namespace Model\Projets;
?>
```

## Utiliser des namespace
Tout code qui suit une déclaration d'espace de noms fonctionne à l'intérieur de l'espace de noms, de sorte que les classes appartenant à l'espace de noms peuvent être instanciées sans aucun qualificatif. Pour accéder aux classes depuis l’extérieur d’un espace de noms, la classe doit être associée à l’espace de noms.

```bash
<?php
$Projets = new Model\Projets();
?>
```

## Alias d'espace de noms
Il peut être utile de donner un alias à un espace de noms ou à une classe pour faciliter son écriture. Cela se fait avec le mot-clé **use** :
```bash
<?php
use Model\Projets as P;
$Projets = new P();
?>
```

## Référence
[https://www.w3schools.com/php/php_namespaces.asp](https://www.w3schools.com/php/php_namespaces.asp)