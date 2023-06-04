

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_profil.css">
    <link rel="stylesheet" href="../../style_navbar.css">
    <title>Profil</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="#"><img class="icone_jeux" src="../../images/jeu-de-plateau.png" alt="Icône Jeux"></a></li>
        <li><a href="../accueil.php">Accueil</a></li>
        <li><a href="./profil/profil.php">Profil</a></li>
        <li><a href="../../jeux/jeux.php">Jeux de Société</a></li>
        <li><button class="deconnexion"><a href="../../deconnexion.php" class="button">Deconnexion</a></button></li>
    </ul>
</nav>

<div class="profil">

    <div class="photo">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <button type="submit">Enregistrer</button>
        </form>

        <?php
        include "../../connectdatabase.php";

        $req = $conn->query('SELECT photo FROM photo');
        while ($data = $req->fetch()) {
            echo "<img src='uploads/" . $data['photo'] . "' width='300px' ><br>";
        }
        ?>
    </div>

    <div class="info_connexion">
        Info <br>
        <?php
        session_start();

    
        
        // if (!isset($_SESSION['id'])) {
        //     // Rediriger vers la page de connexion
        //     header("Location: ../../connexion.php");
        //     exit();
        // } else {
        //     // Récupérer l'ID de l'utilisateur connecté depuis la session
        //     $idUtilisateurConnecte = $_SESSION['id'];
        
        //     // Récupérer l'ID de l'utilisateur à afficher dans le profil
        //     $idUtilisateurProfil = $_GET['id'];
        
        //     // Vérifier si l'ID de l'utilisateur recherché correspond à l'ID de l'utilisateur connecté
        //     if ($idUtilisateurProfil == $idUtilisateurConnecte) {
        //         // Rediriger vers le profil de l'utilisateur connecté
        //         header("Location: ./profil/profil.php?id=$idUtilisateurConnecte");
        //         exit();

        if (!isset($_SESSION['id'])) {
            // Rediriger vers la page de connexion
            header("Location: ../../connexion.php");
            exit();
        } else {
            // Récupérer l'ID de l'utilisateur connecté depuis la session
            $idUtilisateurConnecte = $_SESSION['id'];
        
            // Vérifier si l'ID de l'utilisateur recherché est spécifié dans l'URL
            if (isset($_GET['id'])) {
                $idUtilisateurProfil = $_GET['id'];
        
                // Vérifier si l'ID de l'utilisateur recherché correspond à l'ID de l'utilisateur connecté
                if ($idUtilisateurProfil == $idUtilisateurConnecte) {
                    // Rediriger vers le profil de l'utilisateur connecté
                    header("Location: ./profil.php?id=$idUtilisateurConnecte");
                    exit();
                } else {
                    // Rediriger vers le profil de l'utilisateur recherché
                    header("Location: ./profil.php?id=$idUtilisateurProfil");
                    exit();
                }
            } else {
                // Rediriger vers le profil de l'utilisateur connecté
                header("Location:../../profil/profil.php");
                exit();
            }
        
            // Vérifier si l'utilisateur recherché existe dans la base de données
            $requete = $conn->prepare('SELECT * FROM users WHERE id = :id');
            $requete->bindValue(':id', $idUtilisateurProfil);
            $requete->execute();
            $utilisateur = $requete->fetch();
        
            if ($utilisateur) {
                // Afficher les informations de l'utilisateur recherché
                echo "Prénom : " . $utilisateur["prenom"] . '</br>';
                echo "Nom : " . $utilisateur["nom"] . '</br>';
                echo "Adresse Mail : " . $utilisateur["mail"] . '</br>';
            } else {
                // Rediriger vers une autre page ou afficher un message d'erreur
                header("Location: ../accueil.php");
                exit();
            }
        }
        
        
        ?>
        
    </div>
</div>

<div class="Info_perso_ajout">
    <form method="post" action="traitement.php">
        <p>
            <label for="pseudo">Ton pseudo:</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : luludu44" size="30" maxlength="10"/>
        </p>
    </form>

    <form method="post" action="traitement.php">
        <p>
            <label for="biographie">Biographie</label><br/>
            <textarea name="ameliorer" id="ameliorer" rows="10" cols="50">
                Qui es-tu?
            </textarea>
        </p>
    </form>

    <form method="post" action="Niveau.php">
        <label for="level-select">Quel est ton niveau ?</label>
        <select name="niveau" id="">
            <option value="">Choisie ton niveau</option>
            <option value="">Débutant</option>
            <option value="">Initié</option>
            <option value="">Archi-FAN !</option>
        </select>
        <input type="submit" value="Valider">
    </form>

    <form method="post" action="traitement.php">
        <p>
            <label for="pseudo">Ta ville:</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Paris" size="30" maxlength="10"/>
        </p>
    </form>
</div>

</body>
</html>

