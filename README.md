# Comment Faire fonctionner et utliser l'application 

Bienvenue dans README !
Ce guide vous explique comment installer, configurer et utiliser le site.

Prérequis:

#### Avoir un environnement de développement avec PHP et Composer installés.
#### Avoir une base de données MySQL accessible.

## Installation
Étape 1: Téléchargez le projet sur votre ordinateur.

Étape 2: Ouvrez un terminal et accédez au dossier du projet.

Étape 3: Lancez les commandes suivantes :

composer install
yarn install

Étape 4: Créez la base de données et configurez l'application.

Modifiez le fichier .env pour :
Définir les informations de connexion à la base de données (nom d'hôte, nom d'utilisateur, mot de passe, nom de la base de données).

Étape 5: Chargement des données
Le dossier csv contient tous les fichiers nécessaires pour remplir la base de données.

Étape 1: Importez les fichiers CSV dans la base de données. Vous pouvez utiliser un outil comme MySQL Workbench pour le faire.

Étape 2: Assurez-vous que les données ont été importées correctement.

Étape 6: Démarrage

L'application est maintenant prête à être utilisée. Lancez la commande suivante pour démarrer le serveur :

symfony server:start

L'application sera accessible à l'adresse https://127.0.0.1:8000/

Étape 7: Connexion Admin

Dans les données inclus dans la base de données un compte avec les droits admin pour pouvoir tester toute les autres fonctionnaliter du site ( Le pannel Admin ou l'ecran API )

Identifiant: admin2@gmail.com

Mot de passe : 123456
