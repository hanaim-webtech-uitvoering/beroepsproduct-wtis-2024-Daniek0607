<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "db_connectie.php";

if (isset($_POST['register_button'])) {
    $db = maakVerbinding();

    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $address = trim($_POST['address']);
    $role = "Client";

    $query = $db->prepare("SELECT * FROM [User] WHERE username = ?");
    $query->execute([$username]);

    if ($query->fetch()) {
        echo "Deze gebruikersnaam is al in gebruik.";
    } else {
        $query = $db->prepare("INSERT INTO [User] (username, password, first_name, last_name, address, role) VALUES (?, ?, ?, ?, ?, ?)");
        if ($query->execute([$username, $password, $first_name, $last_name, $address, $role])) {
            header("Location: ../index.php?pagina=LoginRegistratieView");
            exit;
        } else {
            echo "Er is iets fout gegaan. Probeer opnieuw.";
        }
    }
}
?>
