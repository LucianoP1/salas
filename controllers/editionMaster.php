<?php

session_start();

require('../database/database.php');

$id = $_POST['idUsr1'];
$name = $_POST['nameUser'];
$tel = $_POST['telUser'];
$dir = $_POST['dirUser'];
$status = $_POST['statusUser'];

//Comparacion de variables
$sql = "SELECT * FROM users WHERE id='$id' AND name='$name' AND tel='$tel' AND dir='$dir' AND baja='$status'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    $message = "No se registra modificaciones.";
} else {
    if ($id !== "" && $name !== "" && $tel !== "" && $dir !== "" && $status !== "") {
        $sql = "UPDATE users SET name='$name' , tel='$tel' , dir='$dir', baja='$status' WHERE id='$id'"; 
        $stmt = $conn->prepare($sql);
    
        if ($stmt->execute()) {
            $message = "Usuario editado con exito.";
        } else {
            $message = "No ha sido posible editar el usuario.";
        }
    } else {
        $message = "Información incompleta para la edición del usuario.";
    }
}

$_SESSION['edition'] = $message;
header("location: ../admin.php");
?>