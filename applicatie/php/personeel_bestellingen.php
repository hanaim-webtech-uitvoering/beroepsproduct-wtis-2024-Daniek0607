<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_connectie.php";

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'Personnel') {
    echo "Je hebt geen toegang.";
    exit();
}

$db = maakVerbinding();

$query = $db->prepare("SELECT * FROM Pizza_Order ORDER BY datetime DESC");
$query->execute();
$bestellingen = $query->fetchAll(PDO::FETCH_ASSOC);
