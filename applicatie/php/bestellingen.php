<?php
session_start();

require_once 'php/db_connectie.php';

$db = maakVerbinding();

$query =  $db->prepare("SELECT * FROM Product");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

