<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <a href ="">Profil</a>
    <a href="#">Accueil</a>
    <button>Deconnexion</button>
    <?php session_start();// une fois par fichier 

    echo "<p class=\"test\">";
    echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    echo "</p>"; ?>
    <form method = "GET">
        <input type="search" name="q" placeholder="Recherche" />
        <input type="submit" value="valider" />
    </form>

    <?php
    include "../connectdatabase.php" ;

    if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = $_GET['q'];
        $nom= $conn->query('SELECT * From users WHERE nom LIKE "%'.$q.'%"' );
        $prenom = $conn->query('SELECT * FROM users WHERE prenom LIKE "%'.$q.'%"');
    }
    $index = 0 ; 
    while($a = $nom->fetch()) {?>
    <ul>
        <li> <?php echo $a["nom"] ;
        $index++; ?></li>
    </ul>               
   <?php  } 
   //echo $index;

   if ($index == 0 ){
    while($b = $prenom->fetch()) {?>
    <ul>
        <li> <?php echo $b["prenom"] ;?> </li>
   </ul>
   <?php } 
}
   
   


 
    ?>
</body>
</html>

      
            