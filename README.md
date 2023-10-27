# Mercadona

![Logo](https://mercadona.popdev.fr/images/logo_mercadona.png)
[Accéder au projet en ligne](https://mercadona.popdev.fr/)


## Table des matières

1. Informations générales
2. Sujet
3. Auteur
4. Stack
5. Prérequis
6. Installation
    A. Déployer en local
    B. Déployer sur Heroku
7. Documents complémentaires

## 1. Informations générales

Projet réalisé dans le cadre du bloc 3de mon Bachelor pour le titre de développeur d'application web.
Dans le dossier Annexes du dépôt se trouvent les documents demandés.


## 2. Sujet

> Notre client, une grande enseigne de supermarchés en Espagne (Mercadona), veut une application web pour proposer ses promotions en ligne, et non plus par des des tracts papier. L'ESN PromoWeb est en charge de ce projet. José qui travaille pour Mercadona est en charge de présenter le projet à PromoWeb. 

> Le visiteur accédera à une page d'acueil présentant rapidement les services de Mercadona. 

> Le visiteur aura accès dans le menu à une page Catalogue référençant tous les produits de Mercadona meêm ceux n'ayant pas de promotion.Le visiteur a une lecteur seule de tous les produits. 

> L'administrateur aura accès à un back-office dans lequel il pourra voir, créer, modifier et supprimer un produit. Un produit est défini par un libelé, une description, un prix, une image et une catégorie. Une catégorie est définie uniquement par un libelé. 

> L'administrateur une fois créé un produit, pourra appliquer une promotion sur ce produit (date de début, date de fin et pourcentage de remise)

> La vue détaillée d'un produit n'est pas possible

> La page Catalogue affiche toutes les informations du produit

> Lorsqu'un produit est en promotion, son prix doit être affiché en gras et en rouge

> Pour tout ajout d'un administrateur, le personnel de Mercadona devra demander à PromoWeb de créer un nouvel administrateur. 

## 3. Auteur

Jérôme OLLIVIER 


## 4. Stack

- **Front-end:** HTML / CSS /Javascript /Bootstrap 5
- **Moteur de template:** Twig
- **Back-end:** PHP 8.2, Symfony 5.4 (Long-Term Support Release )
- **Base de données:** MySQL - Maria DB

## 5. Prérequis 

- Xampp avec Apache 2 et MySQL
- PHP >= 8..1.6 avec au minimum ces extensions PHP : intl, pdo_pgsql, xsl, amqp, gd, openssl, sodium.
- Composer >= 2.3.5
- Heroku CLI (optionnel : https://devcenter.heroku.com/articles/heroku-cli)
- Symfony CLI
- un compte Github : pour le suivi du versionning
- un compte Heroku : pour le déploiement de l'application


## 6. Installation 


### Installer Xampp :
https://www.apachefriends.org/fr/download.html

### Créer un répertoire
Puis créer un répertoire Apps dans c:/xampp/ avec un terminal
```bash
c:/xampp/
mkdir Apps
```

### Vérifier les prérequis techniques
Pour vérifier si vous avez toutes les conditions nécessaires à l’installation de Symfony :
```bash
composer require symfony/requirements-checker
```

### Clôner le projet
Clonez le projet dans un répertoire dans le répertoire Apps de XAMPP et créez votre base de données grâce au fichier SQL fourni. 
```bash
git clone https://github.com/Spirecool/supermercado.git
```

### Installer les dépendances Symfony

Pour installer les dépendances de symfony pour ce projet, lancez la commande :
```bash
composer install
```

### Lancer le serveur avec PHP et MySql  :

Pour tester le projet en local, lancez xampp, mamp, ou le logiciel que vous utilisez sur votre machine, lancez Apache et MySQL.

### Insérer le fichier SQL dans la base de données :

Utilisez le fichier mercadona.sql situé dans le dossier Annexes (du Drive) du projet pour créer votre base de données. 

#### Variables d'environnement

Ajoutez les fichiers de configuration des variables d'environnement (.env, .env.local).

Ce projet nécessite le paramétrage de APP_ENV, APP_SECRET et DATABASE_URL
Pensez à supprimer ces variables d'environnemnt de votre fichier .env, avant votre premier push sur GitHub et ne les mettre que dans le fichier .env.local

Saisissez vos identifiants PhpMyAdmin et définissez le nom de votre base de données dans la variable suivante :
```bash
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
```


#### Tester l'application

Pour lancer votre application, lancez la commande :
```bash
symfony server:start
```

Pensez à bien vérifier que MySQL sur Xampp soit bien activé, pour que votre base de données soit accessible.

Ouvrez votre navigateur sur <http://localhost:8000/>

Pour plus d'informations, vous pouvez lire la documentations symfony :
<https://symfony.com/doc/current/setup.html>


### Déployer en ligne sur Heroku

Pour le déploiement en ligne, il vous suffira de créer un compte Heroku. Une fois le projet clôné sur un compte github, la connection peut être établie de diverses façons:

1. Par les CLI heroku depuis la console VSCODE par exemple.

2. En automatisant le déploiement sur la branche principale de votre github. Pour cela il faudra choisir l'option adéquate depuis le dashboard de Heroku dans l'onglet deploy. *
3. De façon manuelle, en sélection la branche à déployer en bas de la page deploy. 

Créer le fichier Procfile 

```bash
echo 'web: heroku-php-apache2 public/' > Procfile
git add Procfile
git commit -m "Heroku Procfile"
```

PEnsez à paramétrer les variables d'environnement (APP_ENV, APP_SECRET, DATABASE_URL ET MAILER_DSN) dans l'onglet settings de Heroku(cliquez sur Reveal Config Vars) et n'oubliez pas d'ajouter le build pack heroku/php. Dans l'onglet Resources vous ajouterez un add-on de base de données. J'ai choisis ClearDb MySQLsymfony. La valeur de DATABASE_URL devra être reprise en fonction de cette base (copiez-collez l'intégralité de la variable dans la bonne section). Pour créer le schéma et injecter les données dans votre base en ligne, l'utilisation de Workbench d'Oracle, ou d'un autre utilitaire de gestion de base de données sera nécessaire pour l'exécution du script sql fourni dans les Annexes.

## 7. Documents complémentaires

Le manuel d'utilisation au format html (slides) est dans le répertoire "ANNEXES" de ce repository.  

Les autres documents nécessaires à mon projet sont sur mon Google Drive (le lien est sur la copie)
- Les tâches du projet
- La modélisation de la base de données 
- Les schémas de la base de données (méthode Merise)
- Le sitemap
- Les routes de l'application
- La documentation technique (sécurité & évolutions futures)
- Le manuel d'utilisation de l'application 


