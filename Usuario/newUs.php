<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg p-1 bg-primary-subtle ">
        <div class="container-fluid">
            <a class="navbar-brand">Elegant Technology</a>
        </div>
        
    </nav>
    <hr style="margin: .0%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">

<!--Formulario------------------------------------------------------------------------------------------>
    <div class="container fy-4 rounded-1 mt-2 mb-3">
      <h1 class="text-center mb-5">Formulario de registro</h1>
      <form class="row g-3" action="../controllers/signup.php" method="POST">
        <div class="col-md-6">
          <label for="inputUsuario" class="form-label">Usuario</label>
          <input type="text" class="form-control shadow" id="inputUsuario" name="name" placeholder="Registro un nombre de usuario" required>
        </div>
        <div class="col-md-6">
          <label for="inputTelefono" class="form-label">Telefono</label>
          <input type="text" class="form-control shadow" id="inputTelefono" name="tel" placeholder="Registrar solo numeros: 1234567899" required>
        </div>
        <div class="col-12">
          <label for="inputDireccion" class="form-label">Dirección</label>
          <input type="text" class="form-control shadow" id="inputDireccion" name="dir" placeholder="Libertador Av. 1234" required>
        </div>
        <div class="col-12">
          <label for="inputPasword" class="form-label">Contraseña</label>
          <input type="password" class="form-control shadow" id="inputPasword" name="password" placeholder="Ingresar contraseña" required>
        </div>
        <div class="col-6">
          <button type="submit" class="btn btn-primary mt-2 rounded-2">Registrar</button>
        </div>
        <div class="col-6">
          <button type="button" onclick="location.href='../index.php'" class="btn btn-danger mt-2 rounded-2">Volver</button>
        </div>
      </form>
    </div>
    <hr style="margin-top: 9.2%; border-color: rgb(0, 61, 125); opacity: 1; border-width: 12px;">
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
</body>

</html>