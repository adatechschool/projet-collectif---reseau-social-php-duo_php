<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Inscription</title>
</head>
<body>
    <form action="enregistrementBis.php" method="post" enctype="multipart/form-data">
    <p>Votre nom : <input type="text" name="nom" /></p>
    <p>Votre prenom : <input type="text" name="prenom" /></p>
    <p>Votre mail: <input type="text" name="mail" /></p>
    <p>Votre mot de passe: <input type="password" name="mdp" /></p>
    <label for="file">Photo de profil</label>
    <input type="file" name="file">
    <p><input type="submit" value="OK"></p>
    </form>


</body>
</html>

