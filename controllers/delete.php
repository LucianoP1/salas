<?php 

session_start();

require('../database/database.php');


$id =$_SESSION['user_id'];


$sql = "UPDATE users SET baja = '1' WHERE id = '$id'";
$stmt = $conn->prepare($sql);

if($stmt->execute()){
    $message = "el usuario: $name ha sido eliminado con exito.";
    $_SESSION['edit'] = $message;
    header("location: ../usuario/menu.php");
}
else{
    $message = "No ha sido posible eliminar el usuario.";
    $_SESSION['edit'] = $message;
    header("location: ../Usuario/menu.php");
}

?>