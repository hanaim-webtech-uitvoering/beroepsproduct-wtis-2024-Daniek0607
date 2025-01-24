<?php
session_start();
require_once "db_connectie.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = maakVerbinding();

    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), algo: PASSWORD_DEFAULT);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $role = "Client";

    $query = $db->prepare("SELECT * FROM [User] WHERE username = ?");
    $query->execute([$username]);

    if ($query->fetch()) {
        echo "Deze gebruikersnaam is al in gebruik.";
    } else {
        $query = $db->prepare("INSERT INTO [User] (username, password, first_name, last_name, role) VALUES (?, ?, ?, ?, ?)");
        if ($query->execute([$username, $password, $first_name, $last_name, $role])) {
            header("Location: ../index.php?pagina=LoginRegistratieView");
            exit;
        } else {
            echo "Er is iets fout gegaan. Probeer opnieuw.";
        }
    }
}
?>
