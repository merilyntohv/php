<?php

require_once('./connection.php');

$id = $_POST['id'];

$stmt = $pdo->prepare('UPDATE books SET title= :title  WHERE id = :id');
$stmt->execute($title = $_POST('title'));

header('Location: index.php');