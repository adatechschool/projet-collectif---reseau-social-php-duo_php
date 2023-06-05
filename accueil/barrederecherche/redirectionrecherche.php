<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="GET">
    <input type="search" name="q" placeholder="Recherche" />
    <input type="submit" value="valider" />
</form>

<?php
include "../accueil/../connectdatabase.php";


function effectuerRecherche($q)
{
    global $conn;
    
    $results = array(); // Tableau pour stocker les résultats de recherche
    
    $requete = $conn->prepare('SELECT nom, prenom, id FROM users WHERE nom LIKE :q OR prenom LIKE :q');
    $requete->bindValue(':q', '%' . $q . '%');
    $requete->execute();
    
    while ($row = $requete->fetch()) {
        $results[] = $row;
    }
    
    return $results;
}

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $resultats = effectuerRecherche($q);

    if (empty($resultats)) {
        echo "Aucun résultat trouvé.";
    } else {
        echo "<ul>";
        foreach ($resultats as $resultat) {
            // Récupérer le nom ou le prénom en fonction de la recherche

            /**
             * Idee : remplacer le profil.php par un userdetails.php en lecture seule (sans les formulaires).
             */
            echo '<li><a href="./profil/profil_view.php?id='.$resultat['id'].'">'.$resultat['nom'] .' ' . $resultat['prenom'] .'</a></li>';
        
        }
        echo "</ul>";
    }
} else {
    echo "Veuillez entrer une requête de recherche.";
}
?>

</body>
</html>