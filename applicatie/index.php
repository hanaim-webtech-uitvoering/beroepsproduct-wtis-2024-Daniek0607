<?php
session_start();
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/normalise.css" />
</head>

<body>
<?php

include 'components/Navbar.php';

if (isset($_GET['pagina'])) {
  include $_GET['pagina'] . ".php";
} else {
  include 'HomeView.php';
}

include 'components/Footer.php';

?>

</body>

</html>