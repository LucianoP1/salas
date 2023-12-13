<?php

session_start();

require('../database/database.php');

$id = $_POST['editUserId'] ?? null;
$name = $_POST['editUserName'] ?? null;
$tel = $_POST['editUserTel'] ?? null;
$dir = $_POST['editUserDir'] ?? null;
$baja = $_POST['editUserBaja'] ?? null;

$message = 'el id es' . $id . 'el name es' . $name;

if ($id !== null && $name !== null && $tel !== null && $dir !== null && $baja !== null) {
    $sql = "UPDATE users SET name='$name' , tel='$tel' , dir='$dir' , baja='$baja' WHERE id='$id'";
    
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $message = "Usuario editado con exito.";
    } else {
        $message = "No ha sido posible editar el usuario.";
    }
} else {
    $message = "Información incompleta para la edición del usuario.";
}

$_SESSION['edition'] = $message;
header("location: ../admin.php");
?>