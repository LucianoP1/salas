<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css.css" rel="stylesheet">
</head>

<body>
    <!--Navbar---------------------------------------------------------------------------------------------->
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
                                <a class="nav-link text-primary-emphasis pe-4 pe-lg-1 " href="./Usuario/menu.php"><?= htmlspecialchars($_SESSION['user_name']); ?></a>
                                <a href="../controllers/logout.php" class="btn btn-outline-danger lg-1" id="Salir">Salir</a>
                            </div>
                        <?php else : ?>
                            <button class="nav-link" id="Ingreso" data-bs-toggle="modal" data-bs-target="#UserModal">Ingresar</button>
                        <?php endif; ?>
                    </li>
                </div>
            </div>
            
        </div>
    </nav>
    <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">

    <!--Formulario de reserva------------------------------------------------------------------------------>
 
    <div class="container-fluid d-flex justify-content-center border border-warning border-3 mt-1 p-2 mb-2 border-opacity-25" id="contenedor_Venta">
        <form id="miFormulario" action="../Server/ProcesoCompra.html" method="post">
            <div class="row m-3 mx-auto bg-primary-subtle opacity-50 rounded-3">
                <div class="col-12">
                    <h1 class="text-center mt-2">Reserva</h1>
                </div>
                <div class="col-12">
                    <label class="form-check-label" for="canPersonas">Cantidad de personas</label>
                    <input class="form-control rounded-3 m-2 shadow" type="number" placeholder="Mínimo 2" min="1" max="2" id="canPersonas" name="canPersonas" style="max-width: 150px;">
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" value="desayuno" id="chkDesayuno" disabled>
                    <label class="form-check-label" for="chkDesayuno">Desayuno</label>
                    <input class="form-control rounded-3 m-2" type="number" id="cantidadDesayuno" min="0" max="1" style="max-width: 120px; display: none; " placeholder="Cantidad">
                    <span id="desayunoText" style="display: none;">El valor por persona es de 5 U$S.</span>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" value="almuerzo" id="chkAlmuerzo" disabled>
                    <label class="form-check-label" for="chkAlmuerzo">Almuerzo</label>
                    <input class="form-control rounded-3 m-2" type="number" id="cantidadAlmuerzo" min="0" max="1" style="max-width: 120px; display: none;" placeholder="Cantidad">
                    <span id="almuerzoText" style="display: none;">El valor por persona es de 10 U$S.</span>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" value="Barra" id="chkBarra" disabled>
                    <label class="form-check-label" for="chkBarra">Barra de bebidas</label>
                    <input class="form-control rounded-3 m-2" type="number" id="cantidadBarra" style="max-width: 120px; display: none;" min="0" max="1" placeholder="Cantidad">
                    <span id="barraText" style="display: none;">El valor por persona es de 8 U$S.</span>
                </div>
                <div class="col-12 m-1 fs-5">
                    <div class="small text-danger">U$S 8 por persona.</div>
                    <div class="fs-3" id="Mensaje">
                        <span id="Total" name="Mensaje" class="text-success fw-bold" style="display: none;">0</span>
                    </div>
                    <div>
                        <button id="btnReservar" type="submit" class="btn btn-primary mb-2 shadow fs-4 col-12 fw-semibold" style="border-color: rgb(0, 61, 125);" disabled>Reservar</button>
                        <a class="btn col-12 fw-semibold rounded-3" style="border-color: rgb(0, 61, 125); background-color: rgb(242, 141, 66);" href="../index.php">Inicio</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--Footer---------------------------------------------------------------------------------------------->
    <footer>
        <div class="card bg-primary-subtle fixed-bottom">
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
</body>

</html>