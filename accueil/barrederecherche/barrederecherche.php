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

    <?php   
    // include "../config.php";
    include "../accueil/../connectdatabase.php";   
    if(isset($_GET['q']) AND !empty($_GET['q'])) {
        
        $q = $_GET['q'];
        
        $result= $conn->query('SELECT * From users WHERE (nom LIKE "%'.$q.'%") OR (prenom LIKE "%'.$q.'%")');
        while($a = $result->fetch()) {?>
            <ul>
                <li> <?php echo $a["nom"] ; ?></li>
            </ul>               
         <?php  } ?>
<?php } ?>
</body>
</html>