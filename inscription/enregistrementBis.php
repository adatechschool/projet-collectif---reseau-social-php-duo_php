<?php 
include "../connectdatabase.php";

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["mail"];
$mdp = $_POST["mdp"];

// Traitement de la photo de profil
$file = $_FILES['file'];
$fileName = $file['name'];
$tmpName = $file['tmp_name'];
$error = $file['error'];

// Vérifier s'il y a une erreur lors de l'upload de la photo
if ($error === 0) {
    $filePath = 'img/' . $fileName;
    move_uploaded_file($tmpName, $filePath);

    // Insérer les données dans la base de données avec le chemin de la photo
    $new_user = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `mdp`, `photo`) VALUES ('$nom', '$prenom', '$mail', '$mdp', '$filePath')";
    $result = $conn->query($new_user);

    echo "Votre compte est bien enregistré!<br>";
    echo "Merci pour votre inscription 🙂";
    // Redirection vers la page de connexion après 2,5 secondes
    echo "<script>setTimeout(function() { window.location.href = '../connexion/connexion.php'; }, 2500);</script>";
} else {
    echo "Une erreur s'est produite lors du téléchargement de la photo.";
}
?>






