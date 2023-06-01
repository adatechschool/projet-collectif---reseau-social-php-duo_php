<?php

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["file"]["name"]);

echo '<img src="'.$_FILES["file"]["name"].'">';

?>