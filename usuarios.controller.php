<?php
require_once("conexion.php");

class usuarioController
{

    private $conexion;

    public function __construct()
    {
        $pdo = new conexion();
        $this->conexion = $pdo->crearConexion();
    }

    public function loguear($correo, $contrasenia)
    {
        $QUERY = "SELECT * FROM usuarios WHERE correo = ?";

        $stmt = $this->conexion->prepare($QUERY);

        $stmt->execute([$correo]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return "Credenciales invalidas";
        }

        if ($row) {
            if (password_verify($contrasenia, $row['contrasenia'])) {
                $usuario = array(
                    "nombre" => $row["nombre"],
                    "id" => $row["id"],
                );

                session_start();
                $_SESSION['sesion'] = $usuario;
                session_write_close();
                header("Location: home.php");
            } else {
                return "Credenciales invalidas";
            }
        }
    }

    public function registrar($nombre, $correo, $contrsenia)
    {
        if(is_numeric($nombre)){
            return "El nombre no pueden ser solo numeros";
        }

        $QUERYEMAIl = "SELECT COUNT(*) as 'existe' FROM `usuarios` WHERE correo = ?";

        $stmtCorreo = $this->conexion->prepare($QUERYEMAIl);

        $stmtCorreo->execute([$correo]);

        $respuestaCorreo = $stmtCorreo->fetch(PDO::FETCH_ASSOC);

        if ($respuestaCorreo['existe'] > 0) {
            return "Ya existe un usuario con el correo proporcinado";
        }

        $contraseniaHash = password_hash($contrsenia, PASSWORD_DEFAULT);

        $QUERY = "INSERT INTO usuarios (nombre, correo, contrasenia) VALUES (?, ?, ?)";

        $stmt = $this->conexion->prepare($QUERY);

        $respuesta = $stmt->execute([$nombre, $correo, $contraseniaHash]);

        if (!$respuesta) {
            return "Error al momento de registrar usuario";
        }

        return "Usuario registrado";
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
    }
}
