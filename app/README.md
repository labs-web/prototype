# Prototype

## Guide de Démarrage pour prototype 

### 1. Installer les dépendances Composer :
- Les projets Laravel dépendent généralement de Composer pour la gestion des dépendances. Accédez au répertoire racine de votre projet dans le terminal et exécutez :

```bash
composer install
```

### 2. Créer un fichier .env :
- Laravel utilise un fichier `.env` pour la configuration spécifique à l'environnement. Vous devez copier le fichier `.env.example` pour créer votre propre fichier `.env` :

```bash
cp .env.example .env
```

### 3. Configuration de la Base de Données pour un Projet Laravel
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=password
```

### 4. Générer une clé d'application :
- Laravel nécessite une clé d'application qui peut être générée à l'aide de l'outil en ligne de commande `artisan`. Exécutez :

```bash
php artisan key:generate
```
### 5. Migrer la base de données :
- Si le projet utilise une base de données, vous devrez migrer la structure de la base de données. Exécutez :

```bash
php artisan migrate
```

### 6. Exécuter les seeders :
- Une fois que vous avez créé vos seeders, vous pouvez les exécuter pour peupler la base de données:

```bash
php artisan db:seed
```

### 7. Installer les dépendances npm :

```bash
npm install
```

### 8. Démarrer le serveur de développement :

```bash
php artisan serve
```

```bash
npm run dev
```

## Login

- Email
  - `user@gmail.com`
- Password
  - `useruser`

## Extra commande
- On a créé cette commande pour automatiser la configuration ou l'initialisation des actions au sein d'une application Laravel.

```bash
php artisan sync:ControllersActions
```
