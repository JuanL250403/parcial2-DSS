<?php
require_once("conexion.php");

class libroController {
    private $conexion;

    public function __construct()
    {
        $pdo = new conexion();
        $this->conexion = $pdo->crearConexion();
    }

    public function listarLibrosPrestados(){
        session_start();
        $usuario = $_SESSION["sesion"];
        session_abort();

        $QUERY = "SELECT * FROM libros L INNER JOIN usuario_libros UL ON L.id = UL.libro_id WHERE UL.usuario_id = ?";

        $stmt = $this->conexion->prepare($QUERY);

        $stmt->execute([$usuario["id"]]);

        $libros = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $libros[] = $row;
        }

        return $libros;
    }
}

?>