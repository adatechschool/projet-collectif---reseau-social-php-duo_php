<?php 
include "../connectdatabase.php";

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$mail=$_POST["mail"];
$mdp=$_POST["mdp"];


// print_r($_POST);

foreach ($_POST as $el){
    echo $el.'</br>';
}
$new_user = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `mdp`) VALUES ('$nom','$prenom','$mail','$mdp')";
$result = $conn->query($new_user);





header('Location: ../connexion/connexion.php');
  exit();

?>

