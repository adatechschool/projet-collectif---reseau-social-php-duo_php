<?php
function afficherPhotos($requete) {
    while ($data = $requete->fetch()) {
        $cheminPhoto = $data['photo'];
        echo "<img src='".$cheminPhoto."' width='300px'>";
    }
}
?>