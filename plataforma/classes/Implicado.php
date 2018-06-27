<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 26/6/2018
 * Time: 7:22 PM
 */

class Implicado {

    private $id;
    private $idSituacion;
    private $idUsuario;
    private $rol;


    public static function traerTodosId($situacion, $tipo)
    {
        $query = "SELECT * FROM implicados
                  WHERE idSituacion = :id AND rol = :rol";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $situacion,
            'rol' => $tipo
        ]);
        $datosImp = $stmt->fetch();
        /*
        $salida = [];
        while($datosImp = $stmt->fetch()) {
            $salida[] = $datosImp;
        }*/
        return $datosImp;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setIdSituacion($fila['idSituacion']);
        $this->setIdUsuario($fila['idUsuario']);
        $this->setRol($fila['rol']);
    }

    public static function crear($idSituacion, $idUsuario, $rol)
    {
        $query = "INSERT INTO implicados (idSituacion, idUsuario, rol)
                  VALUES (:sit, :usu, :rol)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'sit' => $idSituacion,
            'usu' => $idUsuario,
            'rol' => $rol
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdSituacion()
    {
        return $this->idSituacion;
    }

    /**
     * @param mixed $idSituacion
     */
    public function setIdSituacion($idSituacion)
    {
        $this->idSituacion = $idSituacion;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }



}
