<?php
session_start();

include "../../connectdatabase.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $champ = $_POST["champ"];
    $valeur = $_POST[$champ];

    $update = $conn->prepare("UPDATE users SET $champ = :valeur WHERE id = :id");
    $update->bindValue(':valeur', $valeur);
    $update->bindValue(':id', $id);
    $update->execute();

    // Vous pouvez renvoyer une réponse JSON indiquant si la mise à jour a réussi ou non
    $response = [
        "success" => true
    ];
    echo json_encode($response);
}
?>
