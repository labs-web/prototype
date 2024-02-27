---
layout: default
chapitre: Projets backend
order: 11
---

# projets_backend 

## Les command 

installer composer

```bash
composer install
```

Création de namespace projets dans controller et le fichier projetController

```bash
php artisan make:controller projets\projetController
```

Création de namespace projets dans model et le fichier projet avec le migration

```bash
php artisan make:model projets\projet -m
```
Création de namespace projets dans request et le fichier projetRequest pour valider les inputs

```bash
php artisan make:request projets\projetRequest
```

Création de repositories dossier

```bash
mkdir Repositories
```

Création de fichier de AppBaseRepository.php 

```bash
echo > AppBaseRepository.php
```

Création de fichier de ProjetRepository.php 

```bash
echo > ProjetRepository.php
```