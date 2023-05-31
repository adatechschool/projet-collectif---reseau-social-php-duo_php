<?php 
  include "config.php";

         //On essaie de se connecter
         try {
          $connString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
          $conn = new PDO($connString, DB_USER, DB_PSWD);
      echo "connexion réussie" . "<br />";
      }
      catch(PDOException $e){
      die("Erreur : " . $e->getMessage());
      }
?>