<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
    
    <div>
        <?php
        // include "../accueil/barrederecherche/barrederecherche.php";
        include "../accueil/barrederecherche/redirectionrecherche.php";
        ?>
    </div>

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
        <form method="POST" action="accueil.php">
        <label>Tape ton message ici pour m'écrire</label>
        <input id="texte" rows="2" cols="30" name="message"></input>
        <input id="valid" type="submit">
        </form>
        <?php
        include "../connectdatabase.php"; 
        $content = $_POST["message"];
        $users_id= $_SESSION["id"];
        $req = ("INSERT INTO post (user_id,content) VALUES('$users_id','$content')");
        $result=$conn->query($req);
        ?>
    <div id="message"></div>
    <script>
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'lesposts/loadmessage.php',
                success: function(data){
                    console.log("ok")
                    $('#message').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });  // it will refresh your data every 1 sec
 
</script>

    
</body>
</html>

      

            