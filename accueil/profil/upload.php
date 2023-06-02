<?php

include "../../connectdatabase.php";

if (isset($_FILES['file'])) {

    $tmpName = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $folder = 'uploads/';

    if (move_uploaded_file($tmpName, $folder . $fileName)) {
        echo "photo enregistré";
    } else {
        echo "Erreur";
    }

    $req = $conn ->query("INSERT INTO `photo` (`photo`) VALUES ('$tmpName')");
    


}

?>