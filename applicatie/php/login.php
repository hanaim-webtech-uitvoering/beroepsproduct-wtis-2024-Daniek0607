<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connectie.php';



if (isset($_POST['login_button'])) {
    $db = maakVerbinding();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare('SELECT * FROM [User] WHERE username = ?');
    $query->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['ingelogd'] = true;
        $_SESSION['username'] = $result['username'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['address'] = $result['address'];
        
        header("Location: ../index.php?pagina=HomeView");
    } else {
        echo 'Wachtwoord is fout';
    }
}

