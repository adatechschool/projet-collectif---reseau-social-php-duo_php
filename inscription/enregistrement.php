<?php 
include "../connectdatabase.php";

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$mail=$_POST["mail"];
$mail2=$_POST["mail2"];
$mdp=$_POST["mdp"];

// if (isset($_POST['form_inscription']))
// {
  
//   if(!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["mail"]) AND !empty($_POST["mail2"]) AND !empty($_POST["mdp"]))
//   {
//      $mdpsecure=sha1($mdp);
//   }
//   else 
//   {
//     $message= "Tous les champs doivent être complétés!";
//   }
// }



foreach ($_POST as $el){
    // echo $el.'</br>';
}
$new_user = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `mdp`) VALUES ('$nom','$prenom','$mail','$mdp')";
$result = $conn->query($new_user);

echo "Votre compte est bien enregistré!</br>";
echo "Merci pour votre inscription 🙂";
// header('Location: ../connexion/connexion.php');
//   exit();
?>
<script>
    setTimeout(function() {
      window.location.href = "../connexion/connexion.php";
    }, 2500);
</script>





