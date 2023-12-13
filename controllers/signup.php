<?php

session_start();

require('../database/database.php');

$sql = 'INSERT INTO users (name, tel, dir, pass, baja, admin) VALUES (:name, :tel, :dir, :pass, :baja, :admin)';
$stmt = $conn->prepare($sql);

$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':tel', $_POST['tel']);
$stmt->bindParam(':dir', $_POST['dir']);
$stmt->bindParam(':baja', $baja);
$stmt->bindParam(':admin', $admin);
$baja = isset($_POST['baja']) ? $_POST['baja'] : 0; 
$admin = isset($_POST['admin']) ? $_POST['admin'] : 0; 

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$stmt->bindParam(':pass', $password);

if($stmt->execute()){
    $message = "Usuario registrado con exito.";
    $_SESSION['registro'] = $message;
    header("location: ../index.php");
}
else{
    $message = "No ha sido posible registrar el usuario.";
    $_SESSION['registro'] = $message;
    header("location: ../index.php");
}
?>