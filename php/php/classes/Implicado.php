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


    public static function traerTodosId($situacion)
    {
        $query = "SELECT * FROM implicados
                  WHERE idSituacion = ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$situacion]);
        $salida = [];

        while($datosImp = $stmt->fetch()) {
            $imp = new Implicado();
            $imp->cargarDatos($datosImp);
            $salida[] = $imp;
        }

        return $salida;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setIdSituacion($fila['idSituacion']);
        $this->setIdUsuario($fila['idUsuario']);
        $this->setRol($fila['rol']);
    }

    public static function crear($data)
    {
        $query = "INSERT INTO implicados (idSituacion, idUsuario, rol)
                  VALUES (:sit, :usu, :rol)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'sit' => $data['idSituacion'],
            'usu' => $data['idUsuario'],
            'rol' => $data['rol'],
        ]);

        if(!$exito) {
            throw new Exception('Error al insertar los datos.');
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