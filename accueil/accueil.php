<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Accueil</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#"><img class="icone_jeux" src="../images/jeu-de-plateau.png" alt="Icône Jeux"></a></li>
            <li><a href="#">Accueil</a></li>
            <li><a href ="./profil/profil.php">Profil</a></li>
            <li><a href="../jeux/jeux.php">Jeux de Société</a></li>
            <li><button class="deconnexion"><a href="../deconnexion.php" class="button">Deconnexion</a></button></li>
        </ul>
    </nav>
    <!-- <div class="navbar">
        <a href ="../accueil/profil.php">Profil</a>
        <a href="#">Accueil</a>
        <a href="#">Jeux de Société</a>
        <button><a href="../deconnexion.php" class="button">Deconnexion</a></button>
    </div> -->
    
    

    <!-- <?php
    // session_start();// une fois par fichier 

    echo "<p class=\"test\">";
    echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    echo "</p>";
    

    ?> -->

    <p>
    <?php
    session_start();
    // echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    $prenom = $_SESSION["prenom"];
    $prenomCapitalized = ucfirst($prenom); // Met la première lettre en majuscule
    echo "Bonjour " . $prenomCapitalized . ", bienvenue!";
    ?>
    </p>

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

      

            