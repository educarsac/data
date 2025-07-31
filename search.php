<?php
include 'db.php';
$q = $_GET['q'];
$result = $conn->query("SELECT * FROM alumnos WHERE nombres LIKE '%$q%' OR apellidos LIKE '%$q%'");

echo "<a href='index.php'>← Volver</a>";
echo "<h2>Resultados de búsqueda:</h2>";
echo "<table><tr><th>Nombres</th><th>Apellidos</th><th>Apoderado</th><th>Celular</th><th>Acciones</th></tr>";

while($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['nombres']}</td>
          <td>{$row['apellidos']}</td>
          <td>{$row['apoderado']}</td>
          <td>{$row['celular']}</td>
          <td><a href='edit.php?id={$row['id']}'>Editar</a> | 
              <a href='delete.php?id={$row['id']}'>Eliminar</a></td>
        </tr>";
}
echo "</table>";
?>