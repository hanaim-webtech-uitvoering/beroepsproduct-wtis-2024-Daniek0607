<?php
$winkelmandje = isset($_SESSION['winkelmandje']) ? $_SESSION['winkelmandje'] : [];
?>

<main>
    <h2>Jouw Bestelling</h2>

    <?php if (!empty($winkelmandje)): ?>
        <ul>
            <?php foreach ($winkelmandje as $product_name => $quantity): ?>
                <li><?= htmlspecialchars($product_name) ?> - €<?= htmlspecialchars(string: $product['price']) ?> - <?= $quantity ?></li>
            <?php endforeach; ?>
        </ul>

        <form action="php/plaatsen_bestelling.php" method="POST">
            <label for="address">Bezorgadres:</label>
            <input type="text" id="address" name="address" required>

            <button type="submit">Bestelling Plaatsen</button>
        </form>

        <form action="php/leeg_mandje.php" method="POST">
            <button type="submit">Winkelmandje Leegmaken</button>
        </form>
    <?php else: ?>
        <p>Je winkelmandje is leeg.</p>
    <?php endif; ?>
</main>
