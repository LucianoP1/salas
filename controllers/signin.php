<?php

    session_start();

    require('../database/database.php');

    $usersData = $conn->prepare('SELECT * FROM users WHERE name = :name');
    $usersData->bindParam(':name', $_POST['name']);
    $usersData->execute();

    $result = $usersData->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        $message = "Usuario  incorrectos.";
        $_SESSION['login'] = $message;
        header("location: ../index.php");
    } elseif (count($result) > 0 && password_verify($_POST['password'], $result['pass']) && $result['baja'] == 0) {
        
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['user_tel'] = $result['tel'];
        $_SESSION['user_dir'] = $result['dir'];
        $_SESSION['user_pass'] = $result['pass'];
        $_SESSION['user_baja'] = $result['baja'];
        $_SESSION['user_admin'] = $result['admin'];

        if ($_SESSION['user_admin'] == 1) {
            header("location: ../admin.php");
        }else {
            header("location: ../index.php");
        }

    } else {
        $message = "contraseña incorrecta.";
        $_SESSION['login'] = $message;
        header("location: ../index.php");
    }

?>