<?php
// Acceso a la base de datos de PostreSQL en un servidor de RENDER
$host = "dpg-d076lls9c44c739o31lg-a.frankfurt-postgres.render.com";
$dbname = "catalogo_t804";
$user = "gsmarco";
$pass = "mm0XqtKjmX3TNEVdujzXZFZQfHP5hNDe";

// $host = "localhost";
// $dbname = "catalogo";
// $user = "gsmarco";
// $pass = "Olga0322";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>