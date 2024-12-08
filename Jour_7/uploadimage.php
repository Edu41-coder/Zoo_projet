<?php
$dossier = "image/";
$extension = pathinfo($_FILES["image_id"]["name"], PATHINFO_EXTENSION); 

$nomRandom = uniqid() . '.' . $extension;
$cible = $dossier . $nomRandom;
$fichier = $_FILES['image_id']['tmp_name'];
$upload = move_uploaded_file($fichier, $cible);

$erreurImage = "";
if (!$upload) {
    $erreurImage = "erreurImage";
}
