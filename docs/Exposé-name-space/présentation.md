---
layout: presentation
order: 1
---

# Name space
{:class="sectionHeader"}

<!-- new slide -->

## Introduction

<!-- image name space -->

<!-- new slide -->

## Déclarer un namespace
```bash
<?php

namespace Projets;

?>
```

![Déclarer un namespace](/prototype/exposé-name-space/images/Déclarer-un-namespace.png)

<!-- new slide -->

## Pour une organisation plus poussée

```bash
<?php

namespace Model\Projets;

?>
```

<!-- new slide -->

## Utiliser des namespace

```bash
<?php

$Projets = new Model\Projets();

?>
```

<!-- new slide -->

## Alias d'espace de noms

```bash
<?php

use Model\Projets as P;
$Projets = new P();

?>
```
<!-- new slide -->