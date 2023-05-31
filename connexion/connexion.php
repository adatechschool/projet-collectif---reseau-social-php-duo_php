<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php
    $message = "Vous êtes bien enregistré !";
    echo "<script type='text/javascript'>alert('$message');</script>";
    ?>
    <form action="identification.php" method="post">
  
    <p>Votre mail: <input type="text" name="mail" /></p>
    <p>Votre mot de passe: <input type="password" name="mdp" /></p>
    <p><input type="submit" value="OK"></p>
    </form>
</body>
</html>
