<!DOCTYPE html>
<?php
include "../connectdatabase.php";

session_start();

$mail=$_POST["mail"];
$mdp=$_POST["mdp"];


$sql_mail="SELECT * FROM users WHERE mail = '".$mail."'" ;
$result=$conn->query($sql_mail);


foreach ($result as $el){

  $id=$el["id"];
  $nom=$el["nom"];
  $prenom=$el["prenom"];
  $email=$el["mail"];
  $pass=$el["mdp"];
  
}
echo $id;

$_SESSION["id"]=$id;
$_SESSION["nom"]=$nom;
$_SESSION["prenom"]=$prenom;
$_SESSION["mail"]=$email;
$_SESSION["mdp"]=$pass;

if($mail == $email && $mdp == $pass){
        
    header('Location: ../accueil/accueil.php');
    exit();

} 
else{
    echo " connexion échouée" ;
}


?>
