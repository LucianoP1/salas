<?php

session_start();

require('../database/database.php');

$id = $_POST['idUs'];
$name = $_POST['nameUs'];
$tel = $_POST['telUs'];
$dir = $_POST['dirUs'];
$pass = $_POST['passUs'];
$pass4 = $_POST['pass4'];
$sql = "SELECT * FROM users WHERE id = $id";
$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $Pass2 = $result['pass'];
    if (password_verify($pass, $Pass2)) {
        $sqlUpdate = "UPDATE users SET name=:name, tel=:tel, dir=:dir";

        if (!empty($pass4)) {
            $pass4 = password_hash($pass4, PASSWORD_BCRYPT);
            $sqlUpdate .= ", pass=:pass";
        }

        $sqlUpdate .= " WHERE id=:id";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':name', $name);
        $stmtUpdate->bindParam(':tel', $tel);
        $stmtUpdate->bindParam(':dir', $dir);
        $stmtUpdate->bindParam(':id', $id);

        if (!empty($pass4)) {
            $stmtUpdate->bindParam(':pass', $pass4);
        }

        if ($stmtUpdate->execute()) {
            $_SESSION['edit'] = "Usuario editado con éxito.";
        } else {
            $_SESSION['edit'] = "Error al editar el usuario.";
        }
    } else {
        $_SESSION['edit'] = "La contraseña ingresada no es correcta.";
    }
}

header("location: ../Usuario/menu.php");


$userData = $stmt->fetch(PDO::FETCH_ASSOC);


$_SESSION['userData'] = $userData;
header("location: ../Usuario/menu.php");

// ?>