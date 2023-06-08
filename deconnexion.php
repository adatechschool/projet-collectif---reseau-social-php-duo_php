<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deconnexion</title>
</head>
<body>
<div class="container">
    <p>
    <?php
    session_start();
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit complètement la session

    echo "Vous êtes bien déconnecté!</br>";
    echo "Merci de votre visite et à bientôt 🙂";
    ?>
    </p>
    <script>
        setTimeout(function() {
         window.location.href = "index.php";
        }, 2500);
    </script>
</div>
    
</body>
</html>