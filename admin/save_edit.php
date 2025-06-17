<?php
require 'config.php';
$id    = (int)$_POST['id'];
$name  = $_POST['name'];
$price = (int)$_POST['price'];
$desc  = $_POST['description'] ?? null;

/* jika admin unggah gambar baru, timpa gambar lama */
$imagePart = '';
if (!empty($_FILES['image']['name'])) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageName);
    $imagePart = ", image='$imageName'";
}

$mysqli->query("UPDATE products
                SET name='$name',
                    price=$price,
                    description=" . ($desc ? "'$desc'" : 'NULL') . "
                    $imagePart
                WHERE id=$id");

header("Location: index.php");
