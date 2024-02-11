<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
            <?php if (isset($_SESSION['user_name'])): ?>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="nav-link text-primary-emphasis pe-4 pe-lg-1 " href="./Usuario/menu.php"><?= htmlspecialchars($_SESSION['user_name']); ?></a>
                <a href="./controllers/logout.php" class="btn btn-outline-danger" id="Salir">Salir</a>
              </div>
              <?php else: ?>
              <button class="nav-link" id="Ingreso" data-bs-toggle="modal" data-bs-target="#UserModal">Ingresar</button>
            <?php endif; ?>
            </li>
          </div>
        </div>
      </div>
      <div class="d-none d-lg-block">
        <div class="d-flex flex-row-reverse">  
            <div class="my-2 no-underline" type="button" >
                <a href="https://www.facebook.com/" target="_blank">
                <img src="Icons/facebook.png" alt="facebook.png" style="max-width: 20px; max-height: 20px; margin: 0.7em;"></a>
            </div>
            <div class="my-2 no-underline" type="button" >
                <a href="#" target="_blank">
                <img src="Icons/instagram.png" alt="instagram.png" style="max-width: 20px; max-height: 20px; margin: 0.7em;"></a>
            </div>
            <div class="my-2 no-underline" type="button" >
                <a href="#" target="_blank">
                <img src="Icons/twitter_x_.png" alt="twitter_x_.png" style="max-width: 20px; max-height: 20px; margin: 0.7em;"></a>
            </div>
            <div class="my-2 no-underline" type="button" >
                <a href="#" target="_blank">
                <img src="Icons/tiktok.png" alt="tiktok.png" style="max-width: 20px; max-height: 20px; margin: 0.7em;"></a> 
            </div>
            <p class="m-3 no-underline" style="width: 120px;"> Encontranos en </p>
        </div>
      </div>
    </nav>
    <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">
    
<!--Alertas---------------------------------------------------------------------------------------------->
    <?php if(isset($_SESSION['registro'])){ ?>
      <div class="alert alert-success text-primary m-0 alert-dismissible alert-dismissible fade show" data-bs-dismiss="alert" id="registro-success" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?= $_SESSION['registro'] ?>
      </div>
      <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">   
    <?php 
        unset($_SESSION['registro']);
    }?>
        <?php if(isset($_SESSION['login'])){ ?>
          <div class="alert alert-success text-primary m-0 alert-dismissible alert-dismissible fade show" data-bs-dismiss="alert" id="registro-success" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?= $_SESSION['login'] ?>
      </div>
      <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">    
    <?php 
        unset($_SESSION['login']);
    }?>

<!--Carousel---------------------------------------------------------------------------------------------->
      <div class="mx-auto" style="display:block;">
        <div id="carouselExample" class="carousel slide carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Salas/Sala1.jpg"  class="img-fluid w-100" id="1" style="height: 600px;" alt="Imagen 1">
              <div class="carousel-caption flex-column align-items-center">
                <div>
                <?php if(isset($_SESSION['user_id'])): ?>
                  <button type="button" id="btn1" onclick="btnReserva('1')" class="btn btn-primary fs-5">Reservar</button>
                <?php else: ?>
                  <button type="button" id="btn1" disabled class="btn btn-primary fs-5">Reservar (Regístrate para reservar)</button>
                <?php endif; ?>
                  </div>
                </div>	
            </div>
            <div class="carousel-item">
              <img src="Salas/Sala2.jpg" class="img-fluid w-100" id="2" style="height: 600px;" alt="Imagen 2">
                <div class="carousel-caption flex-column align-items-center">
                <div>
                  <?php if(isset($_SESSION['user_id'])): ?>
                      <button type="button" id="btn2" onclick="btnReserva('2')" class="btn btn-primary fs-5">Reservar</button>
                  <?php else: ?>
                      <button type="button" id="btn2" disabled class="btn btn-primary fs-5">Reservar (Regístrate para reservar)</button>
                  <?php endif; ?>
                  </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="Salas/Sala4.jpg" class="img-fluid w-100" id="3" style="height: 600px;" alt="Imagen 3">
              <div class="carousel-caption flex-column align-items-center">
                <div>
                  <?php if(isset($_SESSION['user_id'])): ?>
                    <button type="button" id="btn3" onclick="btnReserva('3')" class="btn btn-primary fs-5">Reservar</button>
                  <?php else: ?>
                    <button type="button" id="btn3" disabled class="btn btn-primary fs-5">Reservar (Regístrate para reservar)</button>
                  <?php endif; ?>
                  </div>  
              </div>
            </div>
          </div>
          <button class="carousel-control-prev bg-secondary" style="--bs-bg-opacity: .4;" id="prev" onclick="cambiarImagen()" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next bg-secondary" style="--bs-bg-opacity: .4;" id="next" onclick="cambiarImagen()" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>

<!--Cambia texto segun imagen------------------------------------------------------------------------->
    <hr style="margin: 0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 5px;">
    <div class="card bg-primary-subtle" id="carouselCard">
      <div class="card-body" id="Conte">
        <h1 class="card-title fs-1" id="tituloTexto">#</h1>
        <p class="card-text fst-italic lh-base fs-3" id="texto">#</p>
        <a href="#top" class="card-link badge bg-success text-wrap fs-5" style="width: 9rem; height: 2rem;">Ir a reserva</a>
      </div>
    </div>

<!--Modal-Login/nuevo usuario------------------------------------------------------------------------->
    <hr style="margin: 0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">
    <div class="container fy-4 rounded-1">
        <div class="modal fade sm" tabindex="-1" id="UserModal" data-bs-backdrop="static">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content bg-primary">
              <div class="modal-header">
                <button class="btn-close rounded-3 bg-white" data-bs-dismiss="modal"></button>
              </div>
              <div class="moda-body bg-white text-center">
                  <div class="mx-auto m-3">
                      <img src="Usuario/Login.png" alt="Login-icon", style="height: 6rem;">
                  </div>
                  <div class="my-4"> 
                    <h3 class="text-primary fw-bold">Login</h3> 
                  </div>
                  <form action="./controllers/signin.php" method="post">
                  <div class="row justify-content-center m-1">
                    <div class="col-6 mb-3"> 
                      <input type="text" placeholder="Usuario" name="name" class="form-control" required>
                    </div>
                    <div class="col-6 mb-3"> 
                      <input type="password" placeholder="Contraseña" name="password" class="form-control" required>
                    </div>
                  </div>
                  <div class="text-secondary fw-bold m-1"><a href="./Usuario/newUs.php">Nuevo usuario</a></div>
              </div>
              <div class="modal-footer justify-content-center">
                <div class="row justify-content-center">
                  <div class=" col">
                    <button class="btn btn-success col rounded-3 shadow" type="submit">Ingresar</button>
                  </div>
                  </form>
                  <div class=" col">
                    <button class="btn btn-danger col rounded-3 shadow" data-bs-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="js.js"></script>
      </body>

      <!--Footer---------------------------------------------------------------------------------------------->
      <footer>
        <div class="card bg-primary-subtle">
          <div class="card-body text-success">
            
            <p class="card-text text-secondary"><a href="Nosotros/acercaDe.html" class="link-offset-2 link-secondary link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover">Acerca de</a></p>
            <p class="card-text text-secondary"><a href="https://api.whatsapp.com/send?phone=0541124511415" class="link-offset-2 link-secondary link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover">Contactanos</a></p>
          </div>
          <div class="card-footer bg-primary-subtle border-success">
            © 2023 Elegant Technology. Todos los derechos reservados.
          </div>
      </div>
      </footer>
    </html>