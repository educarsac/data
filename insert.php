<?php
include 'db.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$apoderado = $_POST['apoderado'];
$celular = $_POST['celular'];

$conn->query("INSERT INTO alumnos (nombres, apellidos, apoderado, celular) 
VALUES ('$nombres', '$apellidos', '$apoderado', '$celular')");

header("Location: index.php");
?>