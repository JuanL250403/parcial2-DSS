<?php
require_once("conexion.php");

class libroController
{
    private $conexion;

    public function __construct()
    {
        $pdo = new conexion();
        $this->conexion = $pdo->crearConexion();
    }

    public function obtenerLibros()
    {
        $QUERY = "SELECT * FROM libros ";

        $stmt = $this->conexion->prepare($QUERY);

        $stmt->execute();

        $libros = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = $row;
        }

        return $libros;
    }

    public function listarLibrosPrestados()
    {
        session_start();
        $usuario = $_SESSION["sesion"];
        session_abort();

        try {

            $QUERY = "SELECT * FROM libros L INNER JOIN usuario_libros UL ON L.id = UL.libro_id WHERE UL.usuario_id = ?";

            $stmt = $this->conexion->prepare($QUERY);

            $stmt->execute([345]);

            $libros = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $libros[] = $row;
            }

            return $libros;
        } catch (Exception $e) {
            header("Location: error.php");
        }
    }

    public function reservar($idLibro)
    {
        session_start();
        $usuario = $_SESSION["sesion"];
        session_abort();

        $QUERY = "INSERT INTO `usuario_libros` (`id`, `usuario_id`, `libro_id`) VALUES (NULL, ?, ?)";
        $stmt = $this->conexion->prepare($QUERY);
        $stmt->execute([$usuario["id"], $idLibro]);
    }
}
