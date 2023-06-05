<?php
    include "../connectdatabase.php";

    // Ici on va récupérer les valeurs du form 

    $nom=$_POST["nom"];
    $nb_min_joueurs=$_POST["nb_min_joueurs"];
    $nb_max_joueurs=$_POST["nb_max_joueurs"];
    $temps_de_jeux=$_POST["temps_de_jeux"];
    $content=$_POST["content"];
    $niveau=$_POST["selectNiveau"];

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    // Si error est égal à 0, c'est qu'il n'y a pas de problème au click du submit
    if ($error === 0) {
        if ($img_size > 3000000) {
            $em = "Sorry, your file is too large.";
            header ("Location: ../jeux/jeux.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_ex = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_ex)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                $destination_path = '/home/guillaume/Documents/Ada_Tech_School/Projet_collectifs/projet-collectif---reseau-social-php-duo_php/jeux/' . $img_upload_path;
                echo $destination_path;

                move_uploaded_file($tmp_name, $destination_path);

                // On vient insérer les datas dans la DB

                // Je prépare la requête afin d'utiliser bindParam pour avoir accès à des caractères spéciaux
                $new_game = $conn->prepare("INSERT INTO jeux (nom, nb_min_joueurs, nb_max_joueurs, temps_de_jeux, content, niveau, image_url)
                VALUES (:nom, :nb_min_joueurs, :nb_max_joueurs, :temps_de_jeux, :content, :niveau, :image_url)");

                // Liaison des paramètres pour pouvoir accueillir des champs avec des caractères spéciaux
                // comme le nom de jeu "Bataille navale", l'espace est un caractère spécial
                $new_game->bindParam(':nom', $nom);
                $new_game->bindParam(':nb_min_joueurs', $nb_min_joueurs);
                $new_game->bindParam(':nb_max_joueurs', $nb_max_joueurs);
                $new_game->bindParam(':temps_de_jeux', $temps_de_jeux);
                $new_game->bindParam(':content', $content);
                $new_game->bindParam(':niveau', $niveau);
                $new_game->bindParam(':image_url', $new_img_name);
                $new_game->execute();

                header("Location: ../jeux/jeux.php");
                exit();
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: ../jeux/jeux.php?error=$em");
                }
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: ../jeux.jeux.php?error=$em");
    } 

    // Pour récapituler ce qu'on vient de faire :
    // Le form envoie des données comme à l'inscription, ensuite
    // le form nous envoie également une image, cette image est un tableau qui contient des clés, les voici :
        // - Array
        // (
        // [name] => 8b-ark-nova-cover.jpg
        // [full_path] => 8b-ark-nova-cover.jpg
        // [type] => image/jpeg
        // [tmp_name] => /tmp/php8jjdW7
        // [error] => 0
        // [size] => 19689 
        // )
    // Les valeurs sont ensuites stockées dans des variables, on a donc le nom, la size, le nom temporaire enregistré dans le serveur (Apache2) et l'erreur
    // On définit que si la size dépasse 3Mo, la photo est rejetée. Un message d'erreur sera affiché.
    // Ensuite on stocke le nom de l'extension du fichier grace à la fonction native pathinfo et le paramètre PATHINFO_EXTENSION. On le met vite fait en min si ça été 
    // enregistré en maj par l'utilisateur. On définit quelles sont les extensions autorisées avec allowed_ex
    // Ensuite on vérifie si l'extension passe ou non, si c'est non, message d'erreur. Si c'est oui on utilise une fonction move_uploaded_file pour déplacer 
    // la photo dans le bon dossier et ensuite on procède à la requete SQL
    // On envoie un dernier message d'erreur si ce n'est pas l'extension et la taille qui pose problème
    // On termine par la redirection sur la page jeux.php.
?>