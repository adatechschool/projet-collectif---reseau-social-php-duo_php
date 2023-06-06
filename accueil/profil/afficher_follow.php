b<?php
    // include "../../connectdatabase.php";

    // session_start();

    
    // Récupérer les données des followees depuis la base de données

    $sqlFollow ="SELECT followees.nom, followees.prenom,followees.id
                FROM `follow` JOIN users AS followees ON followees.id=follow.idFollowee
                WHERE follow.idFollower=:userId";
              
    $reqFollow = $conn->prepare($sqlFollow);
    $reqFollow->bindValue(':userId',$_SESSION["id"]);
    $reqFollow->execute();

    // Vérifier s'il y a des résultats
    if ($reqFollow ->rowCount()> 0) {
        
    // Afficher la liste des followees
    echo "<div class=\"followee\">";
    echo "<h2 class=\"titreh2\">Liste des followees</h2>";
    echo "<ul class=\"follow-list\">";
    while ($row = $reqFollow->fetch()) {
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $followeeId = $row['id'];
        echo "<li class=\"follow-item\"><a href='profil_view.php?id=$followeeId'>$nom,$prenom</a></li></br>";
    }
    echo "</ul>";
    echo"</div>";
    
} else {
    echo "Aucun follower trouvé.";
}

// Récupérer les données des followers depuis la base de données

$sqlFollower ="SELECT followers.nom, followers.prenom,followers.id 
            FROM `follow` JOIN users AS followers ON followers.id=follow.idFollower
            WHERE follow.idFollowee=:userId";

$reqFollower = $conn->prepare($sqlFollower);
$reqFollower->bindValue(':userId',$_SESSION["id"]);
$reqFollower->execute();

// Vérifier s'il y a des résultats
if ($reqFollower ->rowCount()> 0) {

// Afficher la liste des followers
echo "<div class=\"follower\">";
echo "<h2 class=\"titreh2\">Liste des followers</h2>";
echo "<ul class=\"follow-list\">";
while ($row = $reqFollower->fetch()) {
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $followerId = $row['id'];
    echo "<li class=\"follow-item\"><a href='profil_view.php?id=$followerId'>$nom,$prenom</a></li></br>";
}
echo "</ul>";
echo"</div>";
} else {
echo "Aucun follower trouvé.";
}

?>


