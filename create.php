<?php include 'db.php'; include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO articulos (codigo, descripcion, precio) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['codigo'], $_POST['descripcion'], $_POST['precio']]);
    header("Location: index.php");
}
?>

<form method="POST">
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'footer.php'; ?>
