<?php
require 'config.php';

$name  = $_POST['name'];
$price = (int)$_POST['price'];
$desc  = $_POST['description'] ?? null;

/* --- upload gambar jika ada --- */
$imageName = null;
if (!empty($_FILES['image']['name'])) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageName);
}

/* --- simpan ke DB pakai prepared statement --- */
$stmt = $mysqli->prepare(
    "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("siss", $name, $price, $desc, $imageName);
$stmt->execute();

header("Location: index.php");
