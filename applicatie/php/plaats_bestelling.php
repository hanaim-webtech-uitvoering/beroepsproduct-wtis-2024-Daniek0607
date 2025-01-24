<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_connectie.php";

if (isset($_POST["bestel_button"])) {

    if (!isset($_SESSION['ingelogd']) || !isset($_SESSION['username'])) {
        echo "Je moet ingelogd zijn om een bestelling te plaatsen.";
        exit();
    }

    if (!isset($_SESSION['winkelmandje']) || empty($_SESSION['winkelmandje'])) {
        echo "Je winkelmandje is leeg.";
        exit();
    }

    $db = maakVerbinding();

    $client_username = $_SESSION['username'];
    $client_name = $client_username;
    $personnel_username = "rdeboer"; //statisch
    $datetime = date("Y-m-d H:i:s");
    $status = 1;
    $address = isset($_POST['address']) ? trim($_POST['address']) : $_SESSION['address'];

    $query = $db->prepare("INSERT INTO [Pizza_Order] (client_username, client_name, personnel_username, datetime, status, address) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$client_username, $client_name, $personnel_username, $datetime, $status, $address]);

    $order_id = $db->lastInsertId();

    foreach ($_SESSION['winkelmandje'] as $product_name => $quantity) {
        $query = $db->prepare("INSERT INTO [Pizza_Order_Product] (order_id, product_name, quantity) VALUES (?, ?, ?)");
        $query->execute([$order_id, $product_name, $quantity]);
    }

    unset($_SESSION['winkelmandje']);

    header("Location: ../index.php?pagina=ProfielView");
    exit();
}
?>
