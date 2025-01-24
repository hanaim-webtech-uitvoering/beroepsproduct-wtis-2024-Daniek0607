<?php
include 'php/personeel_bestellingen.php';
?>

<main>

    <h2>Bestellingen Overzicht</h2>
    <table>
        <tr>
            <th>Bestelnummer</th>
            <th>Klantnaam</th>
            <th>Adres</th>
            <th>Datum & Tijd</th>
            <th>Status</th>
            <th>Details</th>
        </tr>
        <?php foreach ($bestellingen as $bestelling): ?>
            <tr>
                <td><?= htmlspecialchars($bestelling['order_id']) ?></td>
                <td><?= htmlspecialchars($bestelling['client_name']) ?></td>
                <td><?= htmlspecialchars($bestelling['address']) ?></td>
                <td><?= htmlspecialchars($bestelling['datetime']) ?></td>
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
                <td>
                    <a href="index.php?pagina=BestellingDetailView&order_id=<?= $bestelling['order_id'] ?>">Details
                        Bekijken</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>