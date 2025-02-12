<?php //conexion a la base de datos Ismael Flores 0101-2000-01178
require_once 'Conexion.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "connected to $dbname at $host successfully  ";
    $consulta = "SELECT * FROM  film limit 5;";


    $stmt = $conn->query($consulta);

    $bitacora = $stmt->fetchAll(PDO::FETCH_ASSOC);




}catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

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


<?php

foreach ($bitacora as $consulta) {
    echo "<div class='card' style='width: 18rem;' >
                 <img src='https://www.pixelstalk.net/wp-content/uploads/2015/12/Jordan-logo-wallpapers.jpg' class='card-img-top' alt='UNICAH'>
                <div class='card-body'>
                    <h5 class='card-title'>{$consulta['film_id']} {$consulta['title']}</h5>
                    <p class='card-text'>Descripcion.{$consulta['description']}.</p>
                </div>
              </div>";
}
?>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
