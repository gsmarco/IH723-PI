<?php include 'db.php'; include 'header.php';

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$params = [];
$where = '';

if ($search !== '') {
    $where = "WHERE codigo ILIKE :search OR descripcion ILIKE :search";
    $params[':search'] = '%' . $search . '%';
}

$totalStmt = $pdo->prepare("SELECT COUNT(*) FROM articulos $where");
$totalStmt->execute($params);
$totalProductos = $totalStmt->fetchColumn();
$totalPages = ceil($totalProductos / $limit);

$sql = "SELECT * FROM articulos $where ORDER BY descripcion ASC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);

if ($search !== '') {
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$productos = $stmt->fetchAll();
?>

<form class="mb-3" method="GET" action="">
  <div class="row">
    <div class="col-8">
      <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Buscar..." value="<?= htmlspecialchars($search) ?>">
          <button class="btn btn-outline-secondary" type="submit">Buscar</button>
      </div>
    </div>
  </div>
</form>

<a href="create.php" class="btn btn-primary mb-3">Crear producto</a>
<table class="table table-bordered">
    <thead><tr><th>Codigo</th><th>Descripción</th><th>Precio</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['codigo']) ?></td>
            <td><?= htmlspecialchars($p['descripcion']) ?></td>
            <td><?= $p['precio'] ?></td>
            <td>
                <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav>
  <ul class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>

<?php include 'footer.php'; ?>
