<?php
require_once("middelware.php");
require_once("libros.controller.php");
require_once("usuarios.controller.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php
    $usuarioCon = new usuarioController();
    $librosCon = new libroController();

    $libros = $librosCon->listarLibrosPrestados();

    session_start();
    $usuario = isset($_SESSION['sesion']) ? $_SESSION['sesion'] : "";
    session_abort();
    ?>

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <h1>Reserva de libros</h1>
                </div>

                <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <h3><?= isset($usuario["nombre"]) ? $usuario["nombre"] : "desconocido" ?></h3>
                </div>

                <?php
                if (isset($_POST["cerrarSesion"])) {
                    $usuarioCon->cerrarSesion();
                    header("Location: login.php");
                } elseif (isset($_POST["registrarse"])) {
                    $usuarioCon->cerrarSesion();
                    header("Location: registro.php");
                }

                ?>
                <form action=<?= $_SERVER["PHP_SELF"] ?> method="post">
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-light me-2" name="cerrarSesion">Cerrar sesión</button>
                        <button type="submit" class="btn btn-warning" name="registrarse">Registrate</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <section class="m-5">

        <?php
        if (!$libros):
        ?>
            <h2>No posees libros prestados</h2>
        <?php
        else:
        ?>
            <h2 class="text-center">Libros prestados</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php
                foreach ($libros as $libro):
                ?>
                    <div class="card m-5" style="width: 18rem;">
                        <img src=<?= $libro['img'] ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $libro['nombre'] ?></h5>
                            <p class="card-text"><?= $libro['descripcion'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            </div>
        <?php
        endif
        ?>
    </section>
</body>

</html>