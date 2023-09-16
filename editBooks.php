<?php

require_once('./connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$stmt = $pdo->prepare('SELECT * FROM book_authors ba LEFT JOIN authors a ON a.id=ba.author_id WHERE book_id=:book_id;');
$stmt->execute(['book_id' => $id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $book['title']; ?></title>
</head>
<body>

    <form action="./edit.php" method="post" id="edit">
        <h1>Raamatu info muutmine</h1>
        <p>Pealkiri</p>
        <input type="text" value="<?= $book['title']; ?>">
        <p>Ilmumisaasta</p>
        <input type="number" value="<?= $book['release_date']; ?>">
        <p>Leheküljed</p>
        <input type="number" value="<?= $book['pages']; ?>">
        <p>Hind</p>
        <input type="number" value="<?= round($book['price'], 2); ?>">
        <button form="edit">Salvesta</button>
    </form>
</body>
</html>