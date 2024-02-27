---
layout: default
chapitre: tasks backend
order: 12
---
# Tasks backend

## Les command 

- installer composer

```bash
composer install
```

- installer composer

```bash
npm install
```

Création de namespace tasks dans controller et le fichier taskController

```bash
php artisan make:controller tasks\taskController
```

Création de namespace tasks dans model et le fichier task avec le migration

```bash
php artisan make:model tasks\task -m
```
Création de namespace tasks dans request et le fichier taskRequest pour valider les inputs

```bash
php artisan make:request tasks\taskRequest
```

Création de repositories dossier

```bash
mkdir Repositories
```

Création de fichier de AppBaseRepository.php 

```bash
echo > AppBaseRepository.php
```

Création de fichier de taskRepository.php 

```bash
echo > taskRepository.php
```