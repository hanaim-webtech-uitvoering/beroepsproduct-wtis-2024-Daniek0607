<?php
include 'php/detail_bestelling.php';
?>

<main>
    <h2>Bestelling Detail</h2>

    <table>
        <tr><th>Bestelnummer</th><td><?= htmlspecialchars($bestelling['order_id']) ?></td></tr>
        <tr><th>Klant</th><td><?= htmlspecialchars($bestelling['first_name'] . ' ' . $bestelling['last_name']) ?></td></tr>
        <tr><th>Adres</th><td><?= htmlspecialchars($bestelling['address']) ?></td></tr>
        <tr><th>Datum & Tijd</th><td><?= htmlspecialchars($bestelling['datetime']) ?></td></tr>
        <tr><th>Status</th>
            <td>
                <form action="php/wijzig_status.php" method="POST">
                    <input type="hidden" name="order_id" value="<?= $bestelling['order_id'] ?>">
                    <select name="status">
                        <option value="1" <?= $bestelling['status'] == '1' ? 'selected' : '' ?>>Geplaatst</option>
                        <option value="2" <?= $bestelling['status'] == '2' ? 'selected' : '' ?>>In de oven</option>
                        <option value="3" <?= $bestelling['status'] == '3' ? 'selected' : '' ?>>Bezorgd</option>
                    </select>
                    <button type="submit" name="opslaan_button">Opslaan</button>
                </form>
            </td>
        </tr>
    </table>

    <h3>Bestelde Producten</h3>
    <table>
        <tr>
            <th>Product</th>
            <th>Aantal</th>
            <th>Prijs per stuk</th>
            <th>Totaal</th>
        </tr>
        <?php $totaal = 0; ?>
        <?php foreach ($producten as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td><?= htmlspecialchars($product['quantity']) ?></td>
                <td>€<?= number_format($product['price'], 2) ?></td>
                <td>€<?= number_format($product['quantity'] * $product['price'], 2) ?></td>
            </tr>
            <?php $totaal += $product['quantity'] * $product['price']; ?>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">Totaalprijs</th>
            <th>€<?= number_format($totaal, 2) ?></th>
        </tr>
    </table>
</main>