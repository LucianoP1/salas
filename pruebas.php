<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./css.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar ----------------------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg p-1 bg-primary-subtle" id="carouselIndex">
        <div class="container-fluid">
            <a class="navbar-brand fs-3">Elegant Technology</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_name'])) : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="nav-link text-primary-emphasis pe-4 pe-lg-1 " href="./admin.php""><?= htmlspecialchars($_SESSION['user_name']); ?></a>
                                <a href=" ./controllers/logout.php" class="btn btn-outline-danger" id="Salir">Salir</a>
                            </div>
                        <?php else : ?>
                            <button class="nav-link" id="Ingreso" data-bs-toggle="modal" data-bs-target="#UserModal">Ingresar</button>
                        <?php endif; ?>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- Content ----------------------------------------------------------------------------------------->

<h2 class="text-center mt-5 mb-1">Prueba</h2>
<input type="text" class="form-control mt-3 border-3 radius-3 mb-5" id="recipient-name-input" placeholder="Nombre">
<input type="text" class="form-control mt-3 border-3 radius-3 mb-5" id="recipient-lastname-input" placeholder="Apellido">
<button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#editUserModal" id="editarBtn" data-bs-whatever="recipient-name-input recipient-lastname-input" >Editar</button>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edición</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                    <label for="recipient-lname" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control" id="recipient-lname">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Enviar mensaje</button>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="./jsDeprueba.js"></script>

</html>