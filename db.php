<?php
$host = "localhost";
$db   = "cleartorrent";
$user = "root";
$pass = "";
$user = "cleartorrent_user";
$pass = "securepass";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed");
}