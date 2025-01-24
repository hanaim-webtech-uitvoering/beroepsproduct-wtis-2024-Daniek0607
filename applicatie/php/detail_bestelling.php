<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "db_connectie.php";

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'Personnel') {
    echo "Je hebt geen toegang.";
    exit();
}

if (!isset($_GET['order_id'])) {
    echo "Geen bestelling geselecteerd.";
    exit();
}

$db = maakVerbinding();
$order_id = $_GET['order_id'];

$query = $db->prepare("
    SELECT po.*, u.first_name, u.last_name 
    FROM Pizza_Order po 
    LEFT JOIN [User] u ON po.client_username = u.username 
    WHERE po.order_id = ?
");
$query->execute([$order_id]);
$bestelling = $query->fetch(PDO::FETCH_ASSOC);

if (!$bestelling) {
    echo "Bestelling niet gevonden.";
    exit();
}

$query = $db->prepare("
    SELECT pop.product_name, pop.quantity, p.price 
    FROM Pizza_Order_Product pop
    JOIN Product p ON pop.product_name = p.name
    WHERE pop.order_id = ?
");
$query->execute([$order_id]);
$producten = $query->fetchAll(PDO::FETCH_ASSOC);

