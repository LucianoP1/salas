<?php
// Asumiendo que estamos en un archivo llamado edit_user.php

// Verificar si el ID del usuario ha sido enviado

    $userId = $_GET['user_id'];
    
    // Conectar a la base de datos
    $pdo = new PDO('mysql:host=your_host;dbname=your_db', 'your_username', 'your_password');
    
    // Obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Actualizar los datos del usuario en la base de datos
        $stmt = $pdo->prepare("UPDATE user SET name = ?, email = ?, password = ? WHERE id = ?");
        $updated = $stmt->execute([$_POST['name'], $_POST['email'], $_POST['password'], $userId]);
        
        if ($updated) {
            echo "Datos actualizados con éxito.";
        } else {
            echo "Error al actualizar los datos.";
        }
    }
    
    // Mostrar formulario con los datos del usuario
    ?>
    <form method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
        
        <input type="submit" value="Actualizar">
    </form>
    <?php

?>
