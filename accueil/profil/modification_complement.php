<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_profil.css">
    <title>Document</title>
</head>
<body>

<div>
    <?php
    include "../../navbar/navbar.php"
    ?> 
</div>
<div id="container_page">
    <div class="profil_page">
        <div class="profil">
            <div class = "profil_container">
                <div class="profil_modif">
                    <form method="post" action="confirmation_modif_complement.php">
                        <p>
                            <label for="pseudo">Ton pseudo:</label>
                            <input type="text" name="newPseudo" id="pseudo" placeholder="Ex : luludu44" size="30" maxlength="10"/>
                        </p>
                        <p>
                            <label for="biographie">Biographie</label><br/>
                            <textarea name="newBio" id="bio" rows="10" cols="50">
                            Qui es-tu?
                            </textarea>
                        </p>
                    
                        <label for="level-select">Quel est ton niveau de jeu ?</label>
                        <select name="niveau" id="niveau">
                            <option value="">--</option>
                            <option value="">Débutant</option>
                            <option value="">Initié</option>
                            <option value="">Archi-FAN !</option>
                        </select>
                        
                        <p>
                            <label for="ville">Ta ville:</label>
                            <input type="text" name="newVille" id="ville" placeholder="Ex : Paris" size="30" maxlength="10"/>
                        </p>
                    <input class="btn_choose" type="submit" value="Enregistrer">
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>


