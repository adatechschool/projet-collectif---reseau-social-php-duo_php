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
        include "connectdatabase.php";
        ?>
        <!-- <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=pc_rs", $username, $password);
        ?> -->

        <!-- <?php 
         //On essaie de se connecter
         try{
            $conn = new PDO("mysql:host=$servername;dbname=pc_rs", $username, $password);
            //On définit le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Connexion réussie';

            $sql="SELECT * FROM users";
            $result = $conn->query($sql);

            foreach($result as $ligne){
                echo $ligne["id"]." ".$ligne["nom"]." ".$ligne["prenom"]." ".$ligne["mail"]." ".$ligne["mdp"];
            }
            
        }

    
        
        /*On capture les exceptions si une exception est lancée et on affiche
         *les informations relatives à celle-ci*/
        catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
        ?> -->
    </body>
</html>