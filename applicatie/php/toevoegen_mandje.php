<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['toev_winkelmand_button'])) {
    $product_name = $_POST['product_name'];
    $quantity = intval($_POST['quantity']);
    $price = $_POST['price'];

    if ($quantity > 0) {
        if (isset($_SESSION['winkelmandje'][$product_name])) {
            $_SESSION['winkelmandje'][$product_name] += $quantity;
        } else {
            $_SESSION['winkelmandje'][$product_name] = $quantity;
        }
    }

    header("Location: ../index.php?pagina=MenuView");
    exit;
}