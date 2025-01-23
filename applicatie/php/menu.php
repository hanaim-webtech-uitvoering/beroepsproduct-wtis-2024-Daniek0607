<?php

require_once "db_connectie.php";

$db = maakVerbinding();

$query =  $db->prepare("SELECT * FROM Product");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

