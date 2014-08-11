testiAdvize
==========

Test - Développeur PHP
------------------------
Permettre à l’aide d’une ligne de commande, d’aller chercher les 200 derniers enregistrements du site “Vie de merde” et de les stocker. (Champs à récupérer : Contenu, Date et heure, et auteur)

- url : http://localhost/Sites/testAdvize/test/public/updateVdms

Permettre la lecture des enregistrements précedemment récupérés à l’aide d’une API REST au format JSON (voir la description de l’API attendue ci ­dessous)

- un simple "return $posts;" retournerait les résultats au format json
- Mais pour une lecture simplifiée des résultats, ils seront affichés au travers de views
    - $this->layout->nest('content','posts.index',compact('posts'));


Configurations requises
------------------------
- Creer une table avec pour nom : iAdvize (l'ensemble des config pour la bdd se trouvent dans : app/config/database.php)
- Lancer l'url http://localhost/Sites/testAdvize/test/public/posts
- cliquer sur update VDMs pour récupérer les 200 dernières VDMs du site internet viedemerde.fr
- Avoir une connexion internet

============================================================================================================

Paramètres :
------------
- form (optionnel) ­ Date de début
- to (optionnel) ­ Date de fin
- author (optionnel) ­ Auteur


Utilisation :
-------------
- /api/posts
- /api/posts?from=2014-01-01&to=2014-­12-­31 
- /api/posts?author=Genius




