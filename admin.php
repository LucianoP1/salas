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
                                <a href="./controllers/logout.php" class="btn btn-outline-danger" id="Salir">Salir</a>
                            </div>
                        <?php else : ?>
                            <button class="nav-link" id="Ingreso" data-bs-toggle="modal" data-bs-target="#UserModal">Ingresar</button>
                        <?php endif; ?>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="./controllers/editionMaster.php" method="post">
            <?php

            require('./database/database.php');

            $result = $conn->query("SELECT * FROM users WHERE admin = 0");

            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Usuario</th>";
            echo "<th>Teléfono</th>";
            echo "<th>Dirección</th>";
            echo "<th>Pass</th>";
            echo "<th>Baja</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";


            while ($row = $result->fetch()) {
                echo "<tr>";
                $idUs = $row['id'];
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                $nameUs = $row['name'];
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                $telUs = $row['tel'];
                echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                $dirUs = $row['dir'];
                echo "<td>" . htmlspecialchars($row['dir']) . "</td>";
                $bajaUs = $row['baja'];
                echo "<td>" . htmlspecialchars($row['baja']) . "</td>";
                


                // echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                // echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                // echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                // echo "<td>" . htmlspecialchars($row['dir']) . "</td>";
                // echo "<td>" . htmlspecialchars($row['baja']) . "</td>";
                // echo "<td><button type='button' class='btn btn-primary  edit-btn data-bs-toggle='modal' data-bs-target='#exampleModal'  data-id='" . htmlspecialchars($row['id']) . "' data-name='" . htmlspecialchars($row['name']) . "' data-tel='" . htmlspecialchars($row['tel']) . "' data-dir='" . htmlspecialchars($row['dir']) . "' data-baja='" . htmlspecialchars($row['baja']) . "'>Editar</button></td>";
                echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' idUs='$idUs' nameUs='$nameUs' telUs='$telUs' dirUs='$dirUs' bajaUs='$bajaUs' >Open modal</button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            ?>
        </form>

        <!-- <script>
            $('.edit-btn').click(function() {
                var id = $(this).data('id');
                var nameUser = $(this).data('name');
                var telUser = $(this).data('tel');
                var dirUser = $(this).data('dir');
                var bajaUser = $(this).data('baja');
                var row = $(this).closest('tr');
                var inputs = row.find('td').slice(1, -1);
                inputs.each(function() {
                    var text = $(this).text();
                    $(this).html("<input type='text' value='" + text + "' />");
                });
                if (inputs.hasClass('baja')) {
                    $(this).replaceWith("<input type='input' name='editUserName' value='Prueba'>");
                }

                $(this).replaceWith("<button type='submit' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal' name='editUserId' value='" + "'>Guardar</button>");
                $('form').append("<input type='hidden' name='editUserId' value='" + id + "'>");
                $('form').append("<input type='hidden' name='editUserName' value='" + nameUser + "'>");
                $('form').append("<input type='hidden' name='editUserTel' value='" + telUser + "'>");
                $('form').append("<input type='hidden' name='editUserDir' value='" + dirUser + "'>");
                $('form').append("<input type='hidden' name='editUserBaja' value='" + bajaUser + "'>");

            });
        </script> -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalLabel">Modificaciones</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/editionMaster.php" method="post">
                            <div class="mb-3">
                                <h2 class="modal-title" > Editar usuario</h2>
                                <label for="recipient-name" class="col-form-label">ID:</label>
                                <input type="input" class="form-control m-2" name="editUserId" id="UsID" readonly>
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="input" class="form-control m-2" name="editUserName" id="UsName">
                                <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                <input type="input" class="form-control m-2" name="editUserTel" id="UsTel">
                                <label for="recipient-name" class="col-form-label">Dirección:</label>
                                <input type="input" class="form-control m-2" name="editUserDir" id="UsDir">
                                <label for="recipient-name" class="col-form-label">Baja:</label>
                                <input type="input" class="form-control m-2" name="editUserBaja" id="UsBaja">
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                        
                </div>
            </div>
        </div>


        <?php if (isset($_SESSION['edition'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                <strong>Atención </strong> <?= $_SESSION['edition'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['edition']);
        } ?>

    </div>
    <div>
        <a class="btn btn-primary" href="./index.php" role="button"> Volver</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="js.js"></script>

</html>