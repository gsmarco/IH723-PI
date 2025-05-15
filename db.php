<?php
$host = "localhost";
$dbname = "catalogo";
$user = "gsmarco";
$pass = "Olga0322";

$host = "dpg-d076lls9c44c739o31lg-a.frankfurt-postgres.render.com";
$dbname = "catalogo_t804";
$user = "gsmarco";
$pass = "mm0XqtKjmX3TNEVdujzXZFZQfHP5hNDe";

$host = "dpg-d0hu5fa4d50c73ativ60-a.oregon-postgres.render.com";
$dbname = "catalogo_e4mp";
$user = "omar_diaz";
$pass = "St709HGRxBiWkjESWFnr5xhy7WJuqvHh";


try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>