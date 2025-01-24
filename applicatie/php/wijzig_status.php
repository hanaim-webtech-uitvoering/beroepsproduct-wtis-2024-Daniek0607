<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_connectie.php";


if (isset($_POST['opslaan_button'])) {
    if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'Personnel') {
        echo "Je hebt geen rechten om dit te doen.";
        exit();
    }

    if (isset($_POST['order_id']) && isset($_POST['status'])) {
        $db = maakVerbinding();
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];

        $query = $db->prepare("UPDATE Pizza_Order SET status = ? WHERE order_id = ?");
        $query->execute([$status, $order_id]);

        header("Location: ../index.php?pagina=BestellingenView");
        exit();
    } else {
        echo "Ongeldige invoer.";
    }
}
