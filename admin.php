<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    <h2 class="text-center mt-5 mb-1">Administración</h2>
    <div class="container-sm mt-5 me-5" style="height: 200px;  max-height: 500px; overflow: auto">
        <table class="table">
            <thead class="thead">
                <tr class="table-dark">
                    <th class="text-center" scope="col">Id</th>
                    <th class="text-center" scope="col">Usuario</th>
                    <th class="text-center" scope="col">Teléfono</th>
                    <th class="text-center" scope="col">Dirección</th>
                    <th class="text-center" scope="col">Estado</th>
                    <th class="text-center bg-light border-bottom-0" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('./database/database.php');
                $result = $conn->query("SELECT * FROM users WHERE admin = 0");
                while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                    //carga de datos en variables
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $tel = $rows['tel'];
                    $dir = $rows['dir'];
                    $baja = $rows['baja'];
                    //carga de datos en tabla
                    echo "<tr class='table-secondary'>";
                    echo "<td class='text-center'>" . $id . "</td>";
                    echo "<td class='text-center'>" . $name . "</td>";
                    echo "<td class='text-center'>" . $tel . "</td>";
                    echo "<td class='text-center'>" . $dir . "</td>";
                    echo "<td class='text-center'>";
                    if ($baja == 1) {
                        echo '<span class="badge bg-danger">Deshabilitado</span>';
                    } else {
                        echo '<span class="badge bg-success ">Habilitado</span>';
                    }
                    echo "</td>";
                    echo "<td class='bg-light border-bottom-0'>" . "<button class='btn btn-outline-warning btn-sm border-2 rounded-3' data-bs-toggle='modal' id='edit' data-bs-target='#editModal' nameToEdit='$name' idToEdit='$id' telToEdit='$tel' dirToEdit='$dir' bajaToEdit='$baja' > Editar</button>" . "</td>"; //envia los datos al modal.
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!---- Modal ---------------------------------------------------------------------------------------->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./controllers/editionMaster.php" method="POST">
                        <div class="mb-3">
                            <label>ID: <span class="badge bg-secondary fs-6" id="idUser">0</span></label>
                            <input type="text" name="idUsr1" id="idUsr" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" name="nameUser" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="col-form-label" >Teléfono:</label>
                            <input type="text" class="form-control" name="telUser" id="tel">
                        </div>
                        <div class="mb-5">
                            <label for="dir" class="col-form-label">Dirección:</label>
                            <input type="text" class="form-control" name="dirUser" id="dir">
                        </div>
                        <hr style="margin: .0%; border-color: rgb(100, 100, 100); opacity: 1; border-width: 5px;">
                        <div class="mb-2 mt-4">
                            <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off">
                            <label class="btn btn-outline-success" for="success-outlined">Habilitado</label>
                            <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                            <label class="btn btn-outline-danger" for="danger-outlined">Deshabilitado</label>
                            <input type="text" name="statusUser" id="status" hidden>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" id="confirm" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-primary float-end me-5" href="./index.php" role="button"> Volver</a>
    </div>
    <?php if(isset($_SESSION['edition'])){ ?>
        <div class="alert alert-success text-primary m-0 alert-dismissible alert-dismissible fade show" data-bs-dismiss="alert" id="registro-success" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?= $_SESSION['edition'] ?>
        </div>
    <?php 
        unset($_SESSION['edition']);
    }?>  
</body>
<script src="js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>