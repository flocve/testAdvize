testiAdvize
==========

Test - Développeur PHP
------------------------
Permettre à l’aide d’une ligne de commande, d’aller chercher les 200 derniers enregistrements du site “Vie de merde” et de les stocker. (Champs à récupérer : Contenu, Date et heure, et auteur)

Permettre la lecture des enregistrements précedemment récupérés à l’aide d’une API REST au format JSON (voir la description de l’API attendue ci­dessous)


Configurations requises
------------------------
- Creer une base une table avec pour nom : iAdvize
- Lancer l'url http://localhost/Sites/testAdvize/test/public/posts
- cliquer sur update VDMs pour récupérer les 15 derniere VDMs du site internet viedemerde.fr
- Avoir une connexion internet

============================================================================================================

Paramètres :
------------
● form (optionnel) ­ Date de début
● to (optionnel) ­ Date de fin
● author (optionnel) ­ Auteur


Utilisation :
-------------
● /api/posts
● /api/posts?from=2014­01­01&to=2014­12­31 
● /api/posts?author=Genius




