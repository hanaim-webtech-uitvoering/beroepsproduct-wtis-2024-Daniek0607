<?php
// include 'php/menu.php';

require_once "php/db_connectie.php";

$db = maakVerbinding();

$query = $db->prepare("SELECT * FROM Product");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<main>
    <h2>Ons Menu</h2>


    <ul>
        <?php foreach ($result as $product):
            ?>
            <li><?= htmlspecialchars($product['name']) ?> - €<?= htmlspecialchars(string: $product['price']) ?></li>

            <li>Pizza Margherita - €8,50</li>
            <li>Pizza Caprese - €9,50</li>
            <li>Focaccia - €5,00</li>
            <li>Cola - €2,50</li>

        <?php endforeach ?>
    </ul>
</main>