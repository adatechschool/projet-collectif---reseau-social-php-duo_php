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

    // CE CODE EST EN TRAVAIL

    // if (isset($_GET['id'])) {
    //     $game_id = $_GET['id'];


    //     $sql_table_like = "SELECT liked FROM `liked` WHERE user_id=:user_id AND jeux_id=:game_id";
    //     $select_like = $conn->prepare($sql_table_like);
    //     $select_like->bindParam(':user_id', $user_id);
    //     $select_like->bindParam(':game_id', $game_id);
    //     $select_like->execute();
    //     $result_select_like = $select_like->fetch(PDO::FETCH_ASSOC);

    //     echo (var_dump($result_select_like)); 

    //     if ($result_select_like['liked'] === 0) {

    //         $sql = "SELECT liked FROM `jeux` WHERE id=:game_id";
    //         $select = $conn->prepare($sql);
    //         $select->bindParam(':game_id', $game_id);
    //         $select->execute();
        
    //         $result = $select->fetch(PDO::FETCH_ASSOC);


    //         if ($result != NULL) {
    //             $liked_count = $result['liked'] + 1;
            
    //             $update_sql = "UPDATE `jeux` SET liked = :liked_count WHERE id = :game_id";
    //             $update_liked = $conn->prepare($update_sql);
    //             $update_liked->bindParam(':liked_count', $liked_count);
    //             $update_liked->bindParam(':game_id', $gameId);
    //             $update_liked->execute();
            
    //             echo $liked_count;


    //         }
    //     }

    //     if ($result_select_like['liked'] === 1) {

    //         $sql = "SELECT liked FROM `jeux` WHERE id=:game_id";
    //         $select = $conn->prepare($sql);
    //         $select->bindParam(':game_id', $game_id);
    //         $select->execute();
        
    //         $result = $select->fetch(PDO::FETCH_ASSOC);


    //         if ($result != NULL) {
    //             $liked_count = $result['liked'] - 1;
            
    //             $update_sql = "UPDATE `jeux` SET liked = :liked_count WHERE id = :game_id";
    //             $update_liked = $conn->prepare($update_sql);
    //             $update_liked->bindParam(':liked_count', $liked_count);
    //             $update_liked->bindParam(':game_id', $game_id);
    //             $update_liked->execute();
            
    //             echo $liked_count;
    //         }
    //     }
    // }

    // Je veux deux if, si if1 sa valeur result SQL est égal à liked 0, tu as le droit de like. La requete update qui suivra fera +1 dans ce if1.
    // if2 si la valeur result SQL est égal à 1, tu as le droit de dislike. Donc ensuite on a la requete update qui fera -1 dans ce if2.

    



    // // echo "<h1>" . $game['liked'] . " c'est le nb likes" . "</h1>";
    // // echo "<h1>" . $game['id'] . " c'est l'ID game" . "</h1>";
    // // echo "<h1>" . $_SESSION['id'] . " c'est l'ID user" . "</h1>";
    // $game_id = $game['id'];
    // echo $game_id . "<br>";
    // echo (gettype($game_id));
    // $game_nom = $game['nom'];
    // echo $game_nom;

    // $sql = "SELECT liked FROM `jeux` WHERE id='".$game_id."'";
    
    // $sql = "SELECT liked FROM `jeux` WHERE id=40";
    

    // $sql = "SELECT nom FROM `jeux` WHERE nom='".$game['nom']."'";
    
    // $sql = "SELECT * FROM `jeux` WHERE nom='".$game_nom."'";
    
    
    // $sql = "SELECT nom FROM `users` WHERE id=1";
    
    // $sql = "SELECT liked FROM `jeux` WHERE id=:game_id";
    // $select = $conn->prepare($sql);
    // $select->bindParam(':game_id', $game_id_to_send);
    // // $select->bindParam(':game_nom', $game['nom']);

    // $select->execute();
    
    // foreach($select as $row) {
    //     $test = $row['liked'] ;
    //     // $test1 = strval($test);
    //     // echo (gettype($test1));
    //     echo $test;

        
    // }
    // $type = $row['liked'];
    // echo (gettype($type));
?>