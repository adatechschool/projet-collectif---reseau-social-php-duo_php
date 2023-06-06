<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_profil.css">
    <title>Document</title>
</head>
<body>

<div>
    <?php
    include "../../navbar/navbar.php"
    ?> 
</div>

<div class="infos_modif">
    <form action="confirmation_modif.php" method="POST" class="form_modif">
        <h2>Tes nouvelles infos :</h2> 
        <p>Prénom : <br><input type="text" name="newPrenom" class="newInput"></p>
        <p>Nom : <br><input type="text" name="newNom" class="newInput"></p>   
        <p>Mail : <br><input type="text" name="newMail" class="newInput"></p>
        <p><input type="submit" value="Valider"></p>
    </form>  
</div>
</body>
</html>


