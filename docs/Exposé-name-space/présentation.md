---
layout: presentation
order: 1
---

# Name space
{:class="sectionHeader"}

<!-- new slide -->

## Introduction
![name space](/prototype/exposé-name-space/images/namespace.png){:width="700px"}*figure: Name space*

<!-- new slide -->

## Déclarer un namespace

```php 
namespace Projets;
```

![Déclarer un namespace](/prototype/exposé-name-space/images/Déclarer-un-namespace.png){:width="900px"}

<!-- new slide -->

## Pour une organisation plus poussée

```php
namespace Model\Projets;
```

<!-- new slide -->

## Utiliser des namespace

```bash
$Projets = new Model\Projets();
```

<!-- new slide -->

## Alias d'espace de noms

```bash
use Model\Projets as P;
$Projets = new P();
```