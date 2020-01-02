[![Codacy Badge](https://api.codacy.com/project/badge/Grade/92b35983276e4d19a2b2870223201985)](https://www.codacy.com/manual/alexdev06/blog?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alexdev06/blog&amp;utm_campaign=Badge_Grade)

INSTALLATION DU SITE


1.	Copier l’ensemble du dossier « blog » sur un serveur local ou à distance.
2.	Importer le fichier blog.sql sur le serveur de base de données Mysql.
3.	Configurer les paramètres d’accès de l’application à la base de données : 
    -	Modifier le fichier PDOFactory.php situé dans src/Fram avec les infos de connexion du serveur de base données. (adresse du serveur, identifiant, mot de passe et nom de la base de données)
4.	Pour executer l’application, configurer le serveur HTTP pour le faire pointer sur le dossier /web.
5.  Pour configurer une adresse email pour la réception des demandes contact, ouvrir le fichier /src/App/Frontend/Modules/Home/HomeController.php et configurer la bibliothèque PHPMailer avec les informations de connexion tel que le nom de la boite email, le mot de passe, le type de server etc...

