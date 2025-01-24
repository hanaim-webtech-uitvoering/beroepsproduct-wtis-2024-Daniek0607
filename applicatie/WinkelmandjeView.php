<?php
$winkelmandje = isset($_SESSION['winkelmandje']) ? $_SESSION['winkelmandje'] : [];
$address = isset($_SESSION['address']) ? $_SESSION['address'] : "";
?>

<main>
    <h2>Jouw Bestelling</h2>

    <?php if (!empty($winkelmandje)): ?>
        <ul>
            <?php foreach ($winkelmandje as $product_name => $quantity): ?>
                <li><?= htmlspecialchars($product_name) ?> - <?= $quantity ?>x</li>
            <?php endforeach; ?>
        </ul>

        <form action="php/plaats_bestelling.php" method="POST">
            <label for="address">Bezorgadres:</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>" required>

            <button type="submit" name="bestel_button">Bestelling Plaatsen</button>
        </form>

        <form action="php/leeg_mandje.php" method="POST">
            <button type="submit" name="leegmand_button">Winkelmandje Leegmaken</button>
        </form>
    <?php else: ?>
        <p>Je winkelmandje is leeg.</p>
    <?php endif; ?>
</main>
