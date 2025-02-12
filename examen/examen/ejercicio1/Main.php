<?php //conexion a la base de datos
require_once 'Conexion.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "connected to $dbname at $host successfully  ";
    $consulta = "SELECT * FROM category limit 5;";


    $stmt = $conn->query($consulta);

    $bitacora = $stmt->fetchAll(PDO::FETCH_ASSOC);




}catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? null;
    $category_id = $_POST['category_id'] ?? null;
}

if ($name &&  $category_id ) {

    $sql = "INSERT INTO category ( name) VALUES (:name, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([ "name" => $name]);
    echo "Categoria agregada correctamente.";
    echo  $_SERVER["REMOTE_ADDR"];
}
else
    echo "No se ha podido crear el registro.";

// fin de la conexion.

?>



<!doctype html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Examen Ismael Flores</title>
</head>
<body>





<form method="post" action="" class="needs-validation" novalidate>

    <div class="mb-3">
        <label for="lastname" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Cargar</button>
</form>

<table class="table table-dark table-striped">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Ultima Actualización</th>

    </tr>
    </thead>
    <?php foreach ($bitacora as $objeto) : ?>

        <tr>

            <td><?php echo $objeto['category_id']; ?></td>
            <td><?php echo $objeto['name']; ?></td>
            <td><?php echo $objeto['last_update']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>





