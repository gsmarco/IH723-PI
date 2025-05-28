<?php
// Acceso a la base de datos de PostreSQL en un servidor de NEON

//   Parámetros de conexión
$host = 'localhost';
$db   = 'catalogo';
$end_point="";
$user = 'root';
$pass = 'Olga0322';
$port = '3306';
  
$host = 'us-east-2.aws.neon.tech';
$db   = 'neondb';
$end_point="options=endpoint=ep-little-boat-a5s7r8sd-pooler";
$user = 'neondb_owner';
$pass = 'npg_kj5t0RPngJZF';
$port = '5432';
$sslmode = 'require';

$dsn = "pgsql:host=$host;port=$port;dbname=$db $end_point;sslmode=$sslmode;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>