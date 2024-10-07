<?php
$host = "Localhost";
$user = "root";
$password = "";
$dbname = "Mortel";
$dsn = "mysql :host={$host}; dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
$pdo ->exec("SET time_zone = '+08:00';");
