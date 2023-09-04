<?php

require_once('./connection.php');

?><ul id="nav"><?php
$stmt = $pdo->query('SELECT * FROM books');

echo "<ul>";

while ($book = $stmt->fetch())
{
?> 
    <li>
        <a href="./book.php?id=<?= $book['id']; ?>">
            <?= $book['title']; ?>
        </a>
    </li>
<?php
}

echo "</ul>";
