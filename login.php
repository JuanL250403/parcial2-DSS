<?php
require_once("usuarios.controller.php")
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
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <?php
        $usuarioCon = new usuarioController();
        if (isset($_POST["iniciar"])):
            $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
            $contrasenia = isset($_POST['contrasenia']) ? $_POST['contrasenia'] : "";
            $respuesta = $usuarioCon->loguear($correo, $contrasenia);

            if ($respuesta):
        ?>
                <div class="alert alert-primary" role="alert">
                    <?= $respuesta ?>
                </div>
            <?php endif ?>
        <?php endif ?>

        <div class="card shadow p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">

            <h3 class="text-center mb-4">Inicio de sesion</h3>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="contrasenia" class="form-control" placeholder="********" required>
                </div>

                <div class="d-grid">
                    <button type="submit" name="iniciar" class="btn btn-primary">
                        Iniciar sesion
                    </button>
                    <a href="registro.php">Registrate</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>