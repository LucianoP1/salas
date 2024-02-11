<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css.css" rel="stylesheet">
</head>

<body class="bg-success-subtle">
    <!--Navbar---------------------------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg p-1 bg-primary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand fs-3">Elegant Technology</a>
            <a class="navbar-brand mt-1">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_name'])) { ?>
                            <a href="../controllers/logout.php" class="btn btn-outline-danger ms-auto" id="Salir">Salir</a>
                        <?php } ?>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">

    <?php if (isset($_SESSION['edit'])) { ?>
        <div class="alert alert-success text-primary m-0 alert-dismissible alert-dismissible fade show" data-bs-dismiss="alert" id="registro-success" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <?= $_SESSION['edit'] ?>
        </div>
        <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">
    <?php
        unset($_SESSION['edit']);
    } ?>

    <!--Formulario------------------------------------------------------------------------------------------>
    <!--TODO: mejorar el formulario------------------------------------------------------------------------->
    <div class="container-full bg-primary-subtle p-3">
        <h2 class="bg-primary-subtle fw-bold">Datos</h2>
        <hr style="margin: 0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 3px;">
        <form action="../controllers/edition.php" method="post">
            <input class="form-control " id="idUser" name="idUs" type="text" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>" readonly hidden>
            <label for="name">Nombre de usuario</label>
            <input class="form-control bg-secondary-subtle" id="name" name="nameUs" type="text" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" aria-label="readonly input example" readonly required>
            <label for="tel">Teléfono</label>
            <input class="form-control bg-secondary-subtle" id="tel" name="telUs" type="text" value="<?php echo htmlspecialchars($_SESSION['user_tel']); ?>" aria-label="readonly input example" readonly required>
            <label for="tel">Direccón</label>
            <input class="form-control bg-secondary-subtle" id="dir" name="dirUs" type="text" value="<?php echo htmlspecialchars($_SESSION['user_dir']); ?>" aria-label="readonly input example" readonly required>
            <label for="pass4" hidden>Cambiar contraseña</label>
            <input class="form-control bg-secondary-subtle" id="pass4" name="pass4" type="text" value="" aria-label="readonly input example" hidden readonly>
            <label for="pass" hidden>Ingrese la clave actual</label>
            <input class="form-control bg-secondary-subtle" id="pass" name="passUs" type="text" value="" aria-label="readonly input example" hidden readonly required>

            <div class="form-check form-switch">
                <input class="form-check-input mt-3 m-2" type="checkbox" role="switch" onchange="toggleEdit(this)" id="flexSwitchCheckDefault">
                <label class="form-check-label mt-3 m-2" for="flexSwitchCheckDefault">Editar informacion</label>
            </div>
            <div class="row"></div>
            <button class="btn col-auto btn-outline-success m-2" id="submit" type="submit" hidden>Guardar cambios</button>
            <a class="btn col-auto btn-outline-warning m-2" href="../index.php">Volver</a>
        </form>
        <a class="btn btn-danger m-2" href="../controllers/delete.php" type="button" disabled>Borrar cuenta</a>
    </div>
    <!-- funcion para switch --------------------------------------------------------------------------->
    <script>
        var originalValues = {};

        function saveOriginalValues() {
            var inputs = document.querySelectorAll('.form-control');
            for (var i = 0; i < inputs.length; i++) {
                originalValues[inputs[i].id] = inputs[i].value;
            }
        }
        function toggleEdit(checkbox) {
    var inputs = document.querySelectorAll('.form-control');
    var submitButton = document.getElementById('submit');
    
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].readOnly = !checkbox.checked;

        if (!checkbox.checked) {
            inputs[i].value = originalValues[inputs[i].id];
        }
        if (inputs[i].id === 'pass' || inputs[i].id === 'pass4') {
            inputs[i].hidden = !checkbox.checked;
            document.querySelector('label[for="pass"]').hidden = !checkbox.checked;
            document.querySelector('label[for="pass4"]').hidden = !checkbox.checked;
        }
    }
    submitButton.hidden = !checkbox.checked;
}
        window.onload = saveOriginalValues;

    </script>
</body>
<!--Footer---------------------------------------------------------------------------------------------->
<footer>
    <div class="card bg-primary-subtle fixed-bottom">
        <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">
        <div class="card-body text-success">

            <p class="card-text text-secondary"><a href="../Nosotros/acercaDe.html" class="link-offset-2 link-secondary link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover">Acerca de</a></p>
            <p class="card-text text-secondary"><a href="https://api.whatsapp.com/send?phone=0541124511415" class="link-offset-2 link-secondary link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover">Contactanos</a></p>
        </div>

        <div class="card-footer bg-primary-subtle border-success">
            © 2023 Elegant Technology. Todos los derechos reservados.
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="../js.js"></script>

</html>