<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $apoderado = $_POST['apoderado'];
    $celular = $_POST['celular'];

    $conn->query("UPDATE alumnos SET nombres='$nombres', apellidos='$apellidos', apoderado='$apoderado', celular='$celular' WHERE id=$id");
    header("Location: index.php");
    exit();
}

$res = $conn->query("SELECT * FROM alumnos WHERE id=$id");
$row = $res->fetch_assoc();
?>

<form method="POST">
  <input type="text" name="nombres" value="<?= $row['nombres'] ?>" required>
  <input type="text" name="apellidos" value="<?= $row['apellidos'] ?>" required>
  <input type="text" name="apoderado" value="<?= $row['apoderado'] ?>" required>
  <input type="text" name="celular" value="<?= $row['celular'] ?>" required>
  <button type="submit">Actualizar</button>
</form>