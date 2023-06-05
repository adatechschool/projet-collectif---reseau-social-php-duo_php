<?php
    include "../../connectdatabase.php";
    session_start();

    $id=$_SESSION['id'];
    
    if (isset($_FILES['file'])) {

        $tmpName = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $folder = 'uploads/';
        
    
        if (move_uploaded_file($tmpName, $folder . $fileName)) {
            echo "photo enregistré";
    
            $filePath = $folder . $fileName;
    
        } else {
            echo "Erreur";
        }
    

    $sql="UPDATE users SET photo = '$filePath'  WHERE id= $id";
    $result=$conn->query($sql);
   
    header('Location: ./profil.php');
    exit();  

}
    
?>