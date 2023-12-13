<?php

session_start();

require('../database/database.php');

$id = $_POST['idUs'];
$name = $_POST['nameUs'];
$tel = $_POST['telUs'];
$dir = $_POST['dirUs'];
$pass = password_hash($_POST['passUs'], PASSWORD_BCRYPT);

$sql = "UPDATE users SET name='$name', tel='$tel', dir='$dir', pass='$pass' WHERE id='$id'";
$stmt = $conn->prepare($sql);

if($stmt->execute()){
    $message = "Usuario editado con exito.";
    $_SESSION['edit'] = $message;
    header("location: ../usuario/menu.php");
}
else{
    $message = "No ha sido posible editar el usuario.";
    $_SESSION['edit'] = $message;
    header("location: ../Usuario/menu.php");
}
?>