<?php

require_once('./connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id'=> $id]);
$book = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$book['title']?></title>
</head>
<body>
    <h1><?=$book['title']?></h1>
    <img src="<?=$book['cover_path']?>">
    <p>Hind: <?= round($book['price'], 2); ?> €</p>
    <p>Ilmumisaasta: <?= $book['release_date']; ?> </p>
</body>
</html>