<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <title>Post</title>
</head>
<body>
    <?php
    include "../accueil/../connectdatabase.php";   

        if (isset($_POST['submit_commentaire'])){

            if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])){
                //$pseudo = $_POST["pseudo"];
                $commentaire = $_POST["commentaire"];
                $iduser=$_SESSION["id"];
                //if(strlen($pseudo) < 25){
                    $ins ="INSERT INTO `commentaire` (`commentaire`, `id_article`,`id_user`) VALUES ('$commentaire',1,'$iduser')";
                    $result = $conn->query($ins);
                    $c_msg="<span style='color: green'> Votre commentaire a bien été posté </span>";                    
                //}
                //else{
                  //  $c_msg="Le pseudo doit faire moins de 25 caractéres";
                //}
            }
            else{
                $c_msg= "Erreur: Tous les champs doivent etre complétés";
            }
        }
        
        $commentaires = "SELECT commentaire, nom, prenom FROM commentaire INNER JOIN users ON commentaire.id_user = users.id WHERE id_article =1 ORDER BY commentaire.id Desc ";
        $resultCom = $conn->query($commentaires);
    ?>
    <br />

    <div class="description"> 
        <?php
    $res= $conn->query('SELECT contenu, nom, prenom From articles ar JOIN users u On u.id = ar.id_user WHERE ar.id = 1');
        while($a = $res->fetch()) {
            echo " Utilisateur : ".$a["nom"]." ".$a["prenom"];?> <br />
            <?php 
            echo "Post : ".$a["contenu"] ;
             } ?>
    </div>

    <div>
        <h4> Commentaires : </h4>
        <form method ="POST">           
            <textarea name="commentaire" placeholder="Votre commentaire..."></textarea> <br />
            <input type = "submit" value="Poster mon commentaire" name="submit_commentaire" />
        </form>
        
     <?php 
     //msg d'erreur
        if(isset($c_msg)){
            echo $c_msg; 
        }
     ?>
     </div> 
     <br /> 

     <div>
        <?php
            session_start();
            $nom = $_SESSION["nom"]; 
            $prenom = $_SESSION["prenom"];
        
            while($c= $resultCom->fetch()){ ?>
            <b><?= $c['nom']."  ".$c['prenom'] ;         
             
            ?> : </b> <?= $c['commentaire']; ?> <br />
            <?php } ?>

    </div> 


</body>
</html>

