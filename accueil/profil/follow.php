<?php
    session_start();

    include "../../connectdatabase.php";
    $getFollowedId=intval($_GET['followedid']); //sécurise la variable

    if($getFollowedId!= $_SESSION['id']){// evite de se suivre soi meme
        $alreadyFollowed =$conn->prepare('SELECT * FROM follow WHERE idFollower = ? AND idFollowee=?');
        $alreadyFollowed ->execute(array($_SESSION['id'],$getFollowedId));
        $alreadyFollowed = $alreadyFollowed->rowCount();

        if($alreadyFollowed==0){
            $addFollow=$conn->prepare('INSERT INTO follow(idFollower,idFollowee) VALUES (?,?)');
            $addFollow->execute(array($_SESSION['id'],$getFollowedId));
        } elseif($alreadyFollowed ==1){
            $deleteFollow=$conn->prepare('DELETE FROM follow WHERE idFollower = ? AND idFollowee=?');
            $deleteFollow->execute(array($_SESSION['id'],$getFollowedId));
        }
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);

?>