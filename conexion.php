<?php
class conexion
{
    private $dsn = "mysql:host=localhost;dbname=desafio2";
    private $user = "root";

    public function crearConexion()
    {
        try {
            $con = new PDO($this->dsn, $this->user, "");

            $con->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $con;
        } catch (PDOException $e) {
            header("Location: error.php");
        }
    }

}
