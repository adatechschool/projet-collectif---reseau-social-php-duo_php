<?php
// session_start();
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
            MAIL => $dataUser[MAIL],
            GET_ID =>$currentId
        ];
    }
}
else {
    $utilisateurs = [
        NOM => $_SESSION[NOM],
        PRENOM => $_SESSION[PRENOM],
        MAIL => $_SESSION[MAIL],
        GET_ID =>$_SESSION[GET_ID]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style_profil.css"> -->
    <link rel="stylesheet" href="style_view_profil.css">
    <title>Profil</title>
</head>
<body>
<div>
    <?php
    include "../../navbar/navbar.php"
    ?>
</div>
<div class="profil">
    <div class="photo">
       
        <?php
        // $id=$_SESSION['id'];
        $id = $resultat['id'];
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
    <div class="info_du_profil">  <br>
    <titre>Informations de profil</titre>
    <p>
        <?php
        // include "../../connectdatabase.php";
        echo "Prénom : ".$utilisateurs["prenom"].'</br>';
        echo "Nom : ".$utilisateurs["nom"].'</br>';
        echo "Adresse Mail : ".$utilisateurs["mail"].'</br>';
        ?>
    </p>
        <!-- <form action="modification.php" method="post">
            <button>
                <img src="./modify_icon.png" alt="">
            </button>
        </form> -->
    </div>
</div>
<div class="follow">
<?php
if(isset($_SESSION['id']) AND $_SESSION['id']!=GET_ID){ // permet d'afficher le bouton uniquement si on est connecté
    $isFolloweeOrNot=$conn->prepare('SELECT * FROM follow WHERE idFollower = ? AND idFollowee=?');
    $isFolloweeOrNot->execute(array($_SESSION['id'],$currentId));
    $isFolloweeOrNot=$isFolloweeOrNot->rowCount();
    if($isFolloweeOrNot==1){
?>
<button class="unfollow"><a href="./follow.php?followedid=<?php echo $currentId ;?>">Unfollow</a></button>
<?php }
else {
?>
<button class="follow_me"><a href="./follow.php?followedid=<?php echo $currentId ;?>">Follow Me</a></button>
<?php }
} ?>
</div>
<div class="Info_perso_ajout">
    <!-- <form method="post" action="traitement.php">
        <p>
            <label for="pseudo">Ton pseudo:</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : luludu44" size="30" maxlength="10"/>
        </p>
    </form> -->
    <!-- <form method="post" action="traitement.php">
        <p>
            <label for="biographie">Biographie</label><br/>
            <textarea placeholder="Qui es tu?" name="ameliorer" id="ameliorer" rows="10" cols="50"></textarea>
        </p>
    </form> -->
    <!-- <form method="post" action="Niveau.php">
        <label for="level-select">Quel est ton niveau ?</label>
        <select name="niveau" id="">
            <option value="">Choisie ton niveau</option>
            <option value="">Débutant</option>
            <option value="">Initié</option>
            <option value="">Archi-FAN !</option>
        </select>
        <input type="submit" value="Valider">
    </form> -->
    <!-- <form method="post" action="traitement.php">
        <p>
            <label for="pseudo">Ta ville:</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Paris" size="30" maxlength="10"/>
        </p>
    </form> -->
</div>
</body>
</html>