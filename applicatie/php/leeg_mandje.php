<?php
session_start();
unset($_SESSION['winkelmandje']);
header("Location: ../index.php?pagina=WinkelmandjeView");