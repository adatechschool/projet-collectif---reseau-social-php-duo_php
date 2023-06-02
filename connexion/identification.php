<!DOCTYPE html>
<?php
include "../connectdatabase.php";

// session_start();

// $mail=$_POST["mail"];
// $mdp=$_POST["mdp"];


// $sql_mail="SELECT * FROM users WHERE mail = '".$mail."'" ;
// $result=$conn->query($sql_mail);


// foreach ($result as $el){

//   $id=$el["id"];
//   $nom=$el["nom"];
//   $prenom=$el["prenom"];
//   $email=$el["mail"];
//   $pass=$el["mdp"];
  
// }
// echo $id;

// $_SESSION["id"]=$id;
// $_SESSION["nom"]=$nom;
// $_SESSION["prenom"]=$prenom;
// $_SESSION["mail"]=$email;
// $_SESSION["mdp"]=$pass;

// if($mail == $email && $mdp == $pass){
        
//     header('Location: ../accueil/accueil.php');
//     exit();

// } 
// else{
//     echo " connexion échouée" ;
// }
session_start();

$mail = $_POST["mail"];
$mdp = $_POST["mdp"];

// $sql_mail = "SELECT * FROM users WHERE mail = '".$mail."'" ;
// $result = $conn->query($sql_mail);

$sql_mail = "SELECT * FROM users WHERE mail = :mail";
$stmt = $conn->prepare($sql_mail); //préparer la requête SQL en remplaçant le paramètre $mail par le marqueur :mail.
$stmt->bindParam(':mail', $mail); //lier la valeur de $mail au marqueur :mail
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
  // Le mail est correct, on récupère les données de l'utilisateur
  $id = $result["id"];
  $nom = $result["nom"];
  $prenom = $result["prenom"];
  $email = $result["mail"];
  $pass = $result["mdp"];
  
  $_SESSION["id"] = $id;
  $_SESSION["nom"] = $nom;
  $_SESSION["prenom"] = $prenom;
  $_SESSION["mail"] = $email;
  $_SESSION["mdp"] = $pass;

  if ($mail == $email && $mdp == $pass) {
    // Redirection vers la page d'accueil
    header('Location: ../accueil/accueil.php');
    exit();
  } else {
    // Le mdp est incorrect
    echo "Connexion échouée : le mot de passe est incorrect</br>";
    echo "<button><a href='./connexion.php'>Connexion</a></button>";
  }
} else {
  // Le mail n'a pas été trouvé dans la base de données
  echo "Connexion échouée : le mail n'existe pas</br>";
  echo "<button><a href='./connexion.php'>Connexion</a></button>";
}


 ?>
