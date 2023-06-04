<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method = "GET">
        <input type="search" name="q" placeholder="Recherche" />
        <input type="submit" value="valider" />
    </form> -->

    <!-- <?php
    
    // include "../config.php";
    include "../accueil/../connectdatabase.php";
   
    
    if(isset($_GET['q']) AND !empty($_GET['q'])) {
        
        $q = $_GET['q'];
        
        $nom= $conn->query('SELECT * From users WHERE nom LIKE "%'.$q.'%"' );
        $prenom = $conn->query('SELECT * FROM users WHERE prenom LIKE "%'.$q.'%"');
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
    
    } else{
        echo "ok";
    }
    ?> -->

<!-- <?php
// Effectuez votre recherche et obtenez les résultats
$resultats = effectuerRecherche();

// Affichez les résultats
foreach ($resultats as $resultat) {
    // Affichez le résultat avec un lien cliquable
    echo '<a href="page_de_destination.php?id=' . $resultat['id'] . '">' . $resultat['titre'] . '</a><br>';
}
?>

<?php
// include "../config.php";
include "../accueil/../connectdatabase.php";

function effectuerRecherche($q) {
    global $conn;
    
    $results = array(); // Tableau pour stocker les résultats de recherche
    
    $nom = $conn->query('SELECT * FROM users WHERE nom LIKE "%'.$q.'%"');
    $prenom = $conn->query('SELECT * FROM users WHERE prenom LIKE "%'.$q.'%"');
    
    $index = 0;
    
    while ($a = $nom->fetch()) {
        $results[] = $a["nom"];
        $index++;
    }
    
    if ($index == 0) {
        while ($b = $prenom->fetch()) {
            $results[] = $b["prenom"];
        }
    }
    
    return $results;
}

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $resultats = effectuerRecherche($q);

    if (empty($resultats)) {
        echo "Aucun résultat trouvé.";
    } else {
        foreach ($resultats as $resultat) {
            echo '<ul><li>'.$resultat.'</li></ul>';
        }
    }
} else {
    echo "Veuillez entrer une requête de recherche.";
}
?>   -->
<!-- </body>
</html> -->