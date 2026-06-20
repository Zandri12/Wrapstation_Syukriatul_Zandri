<?php
$host = 'localhost';
$db = 'ci-task';
$user = 'postgres';
$pass = '0777';

try {
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("DROP TABLE IF EXISTS transactions CASCADE;");
    $pdo->exec("DROP TABLE IF EXISTS products CASCADE;");
    $pdo->exec("DROP TABLE IF EXISTS users CASCADE;");
    $pdo->exec("DROP TABLE IF EXISTS migrations CASCADE;");
    echo "Tables dropped successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
