<!DOCTYPE html>
<html>
    <head>
    <title>Cours PHP / MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
    </head>
 <body>
    <h1>Bases de données MySQL</h1>
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
            //On établit la connexion
        $conn = new mysqli($servername, $username, $password);
            //On vérifie la connexion
            if($conn->connect_error){
            die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
        ?>
 </body>
</html>