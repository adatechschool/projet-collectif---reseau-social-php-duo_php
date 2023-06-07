<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_profil.css">
    <title>Profil</title>
</head>
<body>
<div>
    <?php
    include "../../navbar/navbar.php"
    ?> 
</div>

<?php


include "../../connectdatabase.php";

define('NOM', "nom");
define('PRENOM', "prenom");
define('MAIL', "mail");
define ('GET_ID', "id");

$utilisateurs = [];

if(isset($_GET[GET_ID])) {
    $currentId = $_GET[GET_ID];

    $reqUser = $conn->prepare('SELECT nom, prenom, mail FROM users WHERE id = :currentId');
    $reqUser->bindValue(':currentId', $currentId);
    $reqUser->execute();

    while($dataUser = $reqUser->fetch()){
        $utilisateurs = [
            NOM => $dataUser[NOM],
            PRENOM => $dataUser[PRENOM],
            MAIL => $dataUser[MAIL]
        ];
    }
}
else {
    $utilisateurs = [
        NOM => $_SESSION[NOM],
        PRENOM => $_SESSION[PRENOM],
        MAIL => $_SESSION[MAIL]
    ];
}

?>


<div id="container_page">

<div class="profil_page">
    <div class="profil">
        <div class = "profil_container">
            <div class="presentation_profil">
                <div class ="photo">
                    <form action="upload.php" method="POST" enctype="multipart/form-data" >
                        <label for="file"> <strong> Photo de profil </strong><br></label>
                        <input type="file" name="file">
                        <button class="btn_choose" type="submit">Enregistrer</button>
                    </form>

                    <?php 
                    $id=$_SESSION['id'];

                    $req = $conn->prepare('SELECT photo FROM users WHERE id = :id');
                    $req->bindValue(':id', $id);
                    $req->execute();

                    while ($data = $req->fetch()) {
                        // var_dump($data);
                        $cheminPhoto = $data['photo'];
                        echo "<img src='".$cheminPhoto."' width='300px'>";
                    }
                    ?>
                </div>
                <h3> Informations de connexion :</h3><br>
                <div class="info_connexion">
                    <?php 
                    // include "../../connectdatabase.php";
                    
                    echo "Prénom : ".$utilisateurs["prenom"].'</br>';
                    echo "Nom : ".$utilisateurs["nom"].'</br>';
                    echo "Adresse Mail : ".$utilisateurs["mail"].'</br>';
                    ?>

                    <div class="modif">
                        <form action="modification.php" method="post">
                            <button id="btn_modif">
                                <img src="./modify_icon.png" alt="">
                            </button>
                        </form> 
                    </div>
                </div>
                
                
            </div>
            
            <div class="Info_perso_ajout">
                <h3>Informations complémentaires : </h3>
                <form method="post" action="traitement.php">
                    <p>
                        <label for="pseudo">Ton pseudo:</label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Ex : luludu44" size="30" maxlength="10"/>
                    </p>
                </form>

                <form method="post" action="traitement.php">
                    <p>
                        <label for="biographie">Biographie</label><br/>
                        <textarea name="ameliorer" id="ameliorer" rows="10" cols="50">
                        Qui es-tu?
                        </textarea>
                    </p>
                </form>

                <form method="post" action="Niveau.php">
                    <label for="level-select">Quel est ton niveau de jeu ?</label>
                    <select name="niveau" id="">
                        <option value="">--</option>
                        <option value="">Débutant</option>
                        <option value="">Initié</option>
                        <option value="">Archi-FAN !</option>
                    </select>
                    <input type="submit" class="btn_choose" value="Valider">
                </form>

                <form method="post" action="traitement.php">
                    <p>
                    <label for="pseudo">Ta ville:</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Paris" size="30" maxlength="10"/>
                    </p>
                </form>
            </div>
        </div>
    
        <div class="follow">
            <?php
            include "./afficher_follow.php"
            ?>
       
        </div>
    </div>
</div>
</div>
</body>
</html>
