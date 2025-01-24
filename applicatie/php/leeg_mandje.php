<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connectie.php';


if (isset($_POST["leegmand_button"])) {
    unset($_SESSION['winkelmandje']);
    header("Location: ../index.php?pagina=WinkelmandjeView");
}
