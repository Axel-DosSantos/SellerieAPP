# README

## Configuration du Projet

Ce README fournit des instructions détaillées pour configurer et exécuter le projet après l'avoir cloné depuis le dépôt Git. Suivez ces étapes attentivement pour vous assurer que l'environnement est correctement configuré.

### Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés :

- **PHP** (>=8.1 recommandé)
- **Composer** (Gestionnaire de dépendances pour PHP)
- **Symfony CLI** (facultatif mais recommandé)
- **MySQL** (ou toute autre base de données supportée par Doctrine)
- **Node.js et npm** (pour les assets frontend, si applicable)

### Étapes pour exécuter le projet

#### 1. Cloner le dépôt

```bash
git clone <url-du-dépôt>
cd <dossier-du-projet>
```

#### 2. Installer les dépendances
Exécutez la commande suivante pour installer les dépendances PHP :

```bash
composer install
```

Si le projet utilise des assets frontend, installez les dépendances JavaScript :

```bash
npm install
```

#### 3. Configurer les variables d'environnement

Copiez le fichier .env vers .env.local et mettez à jour les configurations de la base de données et autres paramètres si nécessaire :

bash
Copier le code

```bash
cp .env .env.local
```

Mettez à jour la valeur de DATABASE_URL dans .env.local avec les détails de connexion à votre base de données. Par exemple :

```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name"
```

#### 4. Configurer la base de données

Exécutez les commandes suivantes pour créer la base de données et appliquer les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

#### 5. Build Frontend Assets (if applicable)

Si le projet a des dépendances frontend, compilez les assets :

```bash
npm run build
```

#### 6. Démarrer le serveur
Démarrez le serveur Symfony :

```bash
symfony server:start
```

Access the project in your browser at [http://127.0.0.1:8000](http://127.0.0.1:8000).
# Recap 
git clone <url-du-dépôt>
cd <dossier-du-projet>
composer install
npm install
cp .env .env.local
DATABASE_URL="mysql://nom_utilisateur:mot_de_passe@127.0.0.1:3306/nom_base_de_données"
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
npm run build
symfony server:start
