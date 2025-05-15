<?php include 'db.php'; include 'header.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM articulos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE articulos SET codigo=?, descripcion=?, precio=? WHERE id=?");
    $stmt->execute([$_POST['codigo'], $_POST['descripcion'], $_POST['precio'], $id]);
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id']) ?>">
    <div class="container">    
        <div class="row mb-3">
            <div class="col-4">
                <label>Codigo</label>
                <input type="text" name="codigo" class="form-control" value="<?= htmlspecialchars($producto['codigo']) ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-8">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label>Precio</label>
                <input type="number" step="1.00" name="precio" class="form-control" value="<?= $producto['precio'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'footer.php'; ?>
