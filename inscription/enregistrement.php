<?php 

session_start();
include "../connectdatabase.php";



$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["mail"];
$mdp = $_POST["mdp"];

// Vérifier si tous les champs sont remplis
if (empty($nom) || empty($prenom) || empty($mail) || empty($mdp)) {
    $message = "Tous les champs doivent être remplis.";
    
    // $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>'; 

} else {

    // Vérifier si l'e-mail existe déjà
    $emailExistsQuery = "SELECT COUNT(*) FROM users WHERE mail = '$mail'";
    $emailExistsResult = $conn->query($emailExistsQuery);
    $emailExists = $emailExistsResult->fetchColumn();

    if ($emailExists) {
        $message = "Cet e-mail est déjà enregistré. Veuillez utiliser un autre e-mail.";
        // $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>';

    } else {
      
        // Insérer le nouvel utilisateur
        $new_user = "INSERT INTO users (nom, prenom, mail, mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";
        $result = $conn->query($new_user);

        if ($result) {
            $message = "Votre compte est bien enregistré!";
            $message .= "</br> Merci pour votre inscription 🙂";
            $redirectScript = '<script>setTimeout(function() {window.location.href = "../connexion/connexion.php";}, 1500);</script>';
        } else {
            $message = "Une erreur s'est produite lors de l'enregistrement de votre compte. Veuillez réessayer.";
            $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>';
        }
    }
}
?>

<!-- Afficher le message d'erreur -->
<?php 
// if (isset($message))
// {
  
//   echo '<font color ="red">'.$message."</font>";
//  }
?>

<?php 
// echo $redirectScript; 
?>

<!-- <script>
    setTimeout(function() {
      window.location.href = "../connexion/connexion.php";
    }, 2500);
</script> -->





