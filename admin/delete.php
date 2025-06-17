<?php
require 'config.php';
$id = (int) $_GET['id'];
$mysqli->query("DELETE FROM products WHERE id=$id");
header("Location: index.php");
