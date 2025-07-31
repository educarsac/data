<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>EDUCAR - Sistema de Base de Datos de Alumnos</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
    <img src="logo.png" alt="Logo EDUCAR">
    <h1>EDUCAR<br><span>Sistema de Base de Datos de Alumnos</span></h1>
  </header>

  <main>
    <form action="insert.php" method="POST">
      <input type="text" name="nombres" placeholder="Nombres" required>
      <input type="text" name="apellidos" placeholder="Apellidos" required>
      <input type="text" name="apoderado" placeholder="Padre/Madre/Apoderado" required>
      <input type="text" name="celular" placeholder="Número de Celular" required>
      <button type="submit">Guardar</button>
    </form>

    <form action="search.php" method="GET" class="search-form">
      <input type="text" name="q" placeholder="Buscar por nombre o apellido">
      <button type="submit">Buscar</button>
    </form>

    <h2>Lista de Alumnos</h2>
    <table>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Apoderado</th>
        <th>Celular</th>
        <th>Acciones</th>
      </tr>
      <?php
        $result = $conn->query("SELECT * FROM alumnos");
        while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['nombres'] ?></td>
        <td><?= $row['apellidos'] ?></td>
        <td><?= $row['apoderado'] ?></td>
        <td><?= $row['celular'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">Editar</a>
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </main>
</body>
</html>