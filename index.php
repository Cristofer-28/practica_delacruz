<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catálogo de clientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Catálogo de clientes</h1>
      <p class="lead">Aplicación de muestra del catálogo de clientes</p>
      <hr class="my-4">
      <p>Aplicación de muestra PHP conectada a una base de datos MySQL para enumerar un catálogo de clientes</p>
    </div>

    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Historial Crediticio</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Provincia</th>
          <th>País</th>
          <th>Código Postal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Establecer la conexión a la base de datos
        $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "PRUEBA");

        // Verificar si la conexión fue exitosa
        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        // Ejecutar la consulta SQL
        $cadenaSQL = "SELECT * FROM s_cliente";
        $resultado = mysqli_query($conexion, $cadenaSQL);

        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            // Iterar sobre los resultados y mostrar los datos
            while ($fila = mysqli_fetch_object($resultado)) {
                echo "<tr>
                        <td>" . htmlspecialchars($fila->nombre) . "</td>
                        <td>" . htmlspecialchars($fila->calificacion_crediticia) . "</td>
                        <td>" . htmlspecialchars($fila->direccion) . "</td>
                        <td>" . htmlspecialchars($fila->ciudad) . "</td>
                        <td>" . htmlspecialchars($fila->provincia) . "</td>
                        <td>" . htmlspecialchars($fila->pais) . "</td>
                        <td>" . htmlspecialchars($fila->codigo_postal) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron datos</td></tr>";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
        ?>
      </tbody>
    </table>
  </div>

  <!-- Cargar jQuery completo para evitar problemas con funciones AJAX u otras dependencias -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
