<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <title>Accueil</title>
</head>
<body>
    <div>
        <?php
        include "../navbar/navbar.php";
        ?> 
    </div>
     
    <div class="main">
        <div class="profil">
            Ici l'aperçu profil du user</br>
            <img src="../images/icon_person.png" alt="">
            <?php
               echo $_SESSION["prenom"].'</br>';
            ?>
        </div>

        <div class="main_posts">
            <div class="container_newpost">
                <div class="newPost_headline">
                    Quelque chose à partager ?<br>
                    <form method="POST" >
                        <label>Tape ton message ici pour m'écrire : </label>
                        <input id="texte" rows="2" cols="30" name="newPost"></input>
                        <input id="valid" type="submit"></input>
                    </form>
        <?php
            include "../connectdatabase.php";
            $content = $_POST["newPost"];
            $users_id= $_SESSION["id"];
            if(!empty($content)){
                $req = ("INSERT INTO post (user_id,content) VALUES('$users_id','$content')");
                $result=$conn->query($req);
            }
        ?>
        <div id="message"></div>
        <script>
            $(document).ready(function(){
                function getData(){
                    $.ajax({
                            type: 'POST',
                            url: 'post/loadmessage.php',
                            success: function(data){
                                $('#message').html(data);
                                $("#message").css("font-size","40px");
                                $("#message").css("box-shadow","rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px");
                                $("#message").css("margin","8px");
                                $("#message").css("padding","5px");
                                $("#message").css("background-color","#F1FBFB");
                                $("#message").css("display","flex");
                                $("#message").css("flex-direction","column-reverse");
                                // $("#message").css("align-items","center");
                            }
                    });
                }
        getData();
        setInterval(function () {
        getData();
        }, 2000);
    });
        </script>
        </div>
            </div>
    
          
        </div>

        <div>
            <?php
                include "../accueil/post/post.php";
            ?>
</div>
        <div class="search_bar">
            <strong>Rechercher un ami :</strong>  
            <?php
            // include "../accueil/barrederecherche/barrederecherche.php";
            include "../accueil/barrederecherche/redirectionrecherche.php";
            ?>
        </div>
    </div>
</body>
</html>

      

            