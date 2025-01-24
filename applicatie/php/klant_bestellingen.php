<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db_connectie.php';

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== "Client") {
    echo "Je moet ingelogd zijn.";
    exit();
}

$db = maakVerbinding();
$username = $_SESSION['username'];

$query = $db->prepare("SELECT * FROM [Pizza_Order] WHERE client_username = ? ORDER BY datetime DESC");
$query->execute([$username]);
$bestellingen = $query->fetchAll(PDO::FETCH_ASSOC);