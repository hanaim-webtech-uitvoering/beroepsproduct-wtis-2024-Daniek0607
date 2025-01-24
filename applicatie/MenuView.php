<?php
include 'php/menu.php';

if (!isset($_SESSION['winkelmandje'])) {
    $_SESSION['winkelmandje'] = [];
}

?>

<main>
    <h2>Ons Menu</h2>
    <ul>
        <?php foreach ($result as $product):
            ?>
            <li><?= htmlspecialchars($product['name']) ?> - €<?= htmlspecialchars(string: $product['price']) ?>
                <form action="php/toevoegen_mandje.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                    <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button type="submit" name="toev_winkelmand_button">Toevoegen</button>
                </form>
            </li>
        <?php endforeach ?>
    </ul>
</main>