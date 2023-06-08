<?php
    include "../connectdatabase.php";
    session_start();
    $user_id = $_SESSION["id"];

    // CE CODE FONCTIONNE 

    if (isset($_GET['id'])) {
        $gameId = $_GET['id'];
    
        $sql = "SELECT liked FROM `jeux` WHERE id=:game_id";
        $select = $conn->prepare($sql);
        $select->bindParam(':game_id', $gameId);
        $select->execute();
    
        $result = $select->fetch(PDO::FETCH_ASSOC);


        if ($result != NULL) {
            $likedCount = $result['liked'] + 1;
        
            $updateSql = "UPDATE `jeux` SET liked = :liked_count WHERE id = :game_id";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':liked_count', $likedCount);
            $updateStmt->bindParam(':game_id', $gameId);
            $updateStmt->execute();
        
            echo $likedCount;
        } else {
            echo "Erreur : jeu non trouvé.";
        }
    }
?>