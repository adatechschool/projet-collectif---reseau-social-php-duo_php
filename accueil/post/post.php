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

            if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])){
                $pseudo = $_POST["pseudo"];
                $commentaire = $_POST["commentaire"];
                if(strlen($pseudo) < 25){
                    $ins ="INSERT INTO `commentaire` (`pseudo`, `commentaire`, `id_article`) VALUES ('$pseudo','$commentaire',1)";
                    $result = $conn->query($ins);
                    $c_msg="<span style='color: green'> Votre commentaire a bien été posté </span>";                    
                }
                else{
                    $c_msg="Le pseudo doit faire moins de 25 caractéres";
                }
            }
            else{
                $c_msg= "Erreur: Tous les champs doivent etre complétés";
            }
        }
        
        $commentaires = "SELECT * FROM commentaire WHERE id_article =1 ORDER BY id Desc ";
        $resultCom = $conn->query($commentaires);
    ?>
    <br />
    <div>    
        <?php
        session_start();
        $nom = $_SESSION["nom"]; 
        $prenom = $_SESSION["prenom"];
        $prenomCapitalized = ucfirst($prenom); // Met la première lettre en majuscule
        $nomCapitalized = ucfirst($nom);
        echo  "Utilisateur : ". $nomCapitalized. "  ".$prenomCapitalized; 
         ?>
    
    </div>
    <br />
    <div class="description"> 
        <?php
    $id= $conn->query('SELECT * From articles WHERE id = 1');
        while($a = $id->fetch()) {
          echo "Description : ".$a["contenu"] ;
             } ?>
    </div>
    <div>
        <h4> Commentaires : </h4>
        <form method ="POST">
            <input type ="text" name= "pseudo" placeholder = "Votre pseudo"> <br />
            <textarea name="commentaire" placeholder="Votre commentaire..."></textarea> <br />
            <input type = "submit" value="Poster mon commentaire" name="submit_commentaire" />
        </form>
     <?php 
        if(isset($c_msg)){
            echo $c_msg; 
        }
     ?>
     </div> 
     <br /> 
     <div>
        <?php
            while($c= $resultCom->fetch()){ ?>
            <b><?= $c['pseudo'] ; ?> : </b> <?= $c['commentaire']; ?> <br />
            <?php } ?>

    </div> 


</body>
</html>

