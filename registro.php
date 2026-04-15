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
        $usaurioCon = new usuarioController();

        $respuesta = null;
        $valido = false;
        if (isset($_POST["registrar"])) :
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $contrasenia = isset($_POST["contrasenia"]) ? $_POST["contrasenia"] : "";

            $respuesta = $usaurioCon->registrar($nombre, $correo, $contrasenia);

            if($respuesta === "Usuario registrado"){
                header("Location: login.php");
            }

            if ($respuesta):
        ?>
                <div class="alert alert-primary" role="alert">
                    <?= $respuesta ?>
                </div>
            <?php endif ?>
        <?php endif ?>
        <div class="card shadow p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">

            <h3 class="text-center mb-4">Crear cuenta</h3>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="contrasenia" class="form-control" placeholder="********" required>
                </div>

                <div class="d-grid">
                    <button type="submit" name="registrar" class="btn btn-primary">
                        Registrarse
                    </button>
                    <a href="login.php">Volver al login</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>