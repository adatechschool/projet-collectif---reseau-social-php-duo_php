<?php 

session_start();
include "../connectdatabase.php";

$message = '';

if (isset($_POST["form_inscription"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];


    // Vérifier si tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($mail) || empty($mdp)) {

        $message = "Tous les champs doivent être remplis !";
        // $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>'; 

    } else {

        // Vérifier si l'e-mail existe déjà
        $emailExistsQuery = "SELECT COUNT(*) FROM users WHERE mail = '$mail'";
        $emailExistsResult = $conn->query($emailExistsQuery);
        $emailExists = $emailExistsResult->fetchColumn();

        if ($emailExists) {
            $message = "Cet e-mail est déjà enregistré !</br> Veuillez utiliser un autre e-mail.";
            // $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>';

        } else {
        
            // Insérer le nouvel utilisateur
            $new_user = "INSERT INTO users (nom, prenom, mail, mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";
            $result = $conn->query($new_user);

            if ($result) {
                $message = "Votre compte est bien enregistré !";
                $message .= "</br> Merci pour votre inscription 🙂";
                $redirectScript = '<script>setTimeout(function() {window.location.href = "../connexion/connexion.php";}, 1500);</script>';
            
            } else {
                $message = "Une erreur s'est produite lors de l'enregistrement de votre compte. Veuillez réessayer.";
                // $redirectScript = '<script>setTimeout(function() {window.location.href = "../inscription/inscription.php";}, 1500);</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style_inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div class="inscription">
        <h2>Inscription</h2>
        
        <form action="" method="post">
           
                    <label for="nom">Votre nom :</label><input type="text" name="nom" id="nom" placeholder="Votre nom"/></br>
                    <label for="prenom">Votre prenom : </label><input type="text" name="prenom" id="prenom" placeholder="Votre prenom"/></br>
                    <label for="mail">Votre mail:</label> <input type="email" name="mail" id="mail" placeholder="Votre mail" /></br>
                    <label for="mdp">Votre mot de passe: </label><input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/></br></br>
                    <p><input type="submit"  name ="form_inscription" value="OK"></p>
            
        </form>
        <?php if (!empty($message)) : ?>
            
            <p class="message <?php echo isset($result) && $result ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>
        <?php if (isset($redirectScript)) : ?>
            <?php echo $redirectScript; ?>
        <?php endif; ?>
    </div>
</body>
</html>

