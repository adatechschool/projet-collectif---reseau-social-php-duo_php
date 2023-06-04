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
include "../connectdatabase.php";

function effectuerRecherche($q)
{
    global $conn;
    
    $results = array(); // Tableau pour stocker les résultats de recherche
    
    $requete = $conn->prepare('SELECT * FROM users WHERE nom LIKE :q OR prenom LIKE :q');
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
        foreach ($resultats as $resultat) {
            // Récupérer le nom ou le prénom en fonction de la recherche
            if (stripos($resultat['nom'], $q) !== false) {
                $affichage = $resultat['nom'];
            } elseif (stripos($resultat['prenom'], $q) !== false) {
                $affichage = $resultat['prenom'];
            } else {
                $affichage = '';
            }
            
            if (!empty($affichage)) {
                // Récupérer l'ID de l'utilisateur correspondant au résultat de recherche
                $idUtilisateur = $resultat['id'];

                // Récupérer les informations de l'utilisateur recherché
                $requete = $conn->prepare('SELECT * FROM users WHERE id = :id');
                $requete->bindValue(':id', $idUtilisateur);
                $requete->execute();
                $utilisateur = $requete->fetch();

                // Afficher le lien vers le profil de l'utilisateur avec l'ID correspondant
                echo "$idUtilisateur";
                /**
                 * Idee : remplacer le profil.php par un userdetails.php en lecture seule (sans les formulaires).
                 */
                echo '<ul><li><a href="./profil/profil.php?id='.$idUtilisateur.'">'.$affichage.'</a></li></ul>';
            }
        }
    }
} else {
    echo "Veuillez entrer une requête de recherche.";
}
?>




</body>
</html>