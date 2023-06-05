<?php 
include "../connectdatabase.php";

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$mail=$_POST["mail"];
$mdp=$_POST["mdp"];


// print_r($_POST);

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





