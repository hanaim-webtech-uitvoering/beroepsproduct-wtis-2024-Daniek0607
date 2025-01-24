<?php
include 'php/klant_bestellingen.php'
    ?>

<main>
    <h2>Mijn Bestellingen</h2>
    <?php if (!empty($bestellingen)): ?>
        <table>
            <tr>
                <th>Bestelnummer</th>
                <th>Datum</th>
                <th>Status</th>
                <th>Adres</th>
            </tr>
            <?php foreach ($bestellingen as $bestelling): ?>
                <tr>
                    <td><?= htmlspecialchars($bestelling['order_id']) ?></td>
                    <td><?= htmlspecialchars($bestelling['datetime']) ?></td>
                    <td class="status-<?= $bestelling['status'] ?>">
                        <?= match ($bestelling['status']) {
                            '1' => 'Geplaatst',
                            '2' => 'In de oven',
                            '3' => 'Bezorgd',
                            default => 'Onbekend'
                        } ?>
                    </td>
                    <td><?= htmlspecialchars($bestelling['address']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Je hebt nog geen bestellingen geplaatst.</p>
    <?php endif; ?>
</main>