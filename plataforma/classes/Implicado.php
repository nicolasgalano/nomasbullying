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
    private $cantidad;


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
        $this->setIdUsuario($fila['idUsuario']);
        $this->setCantidad($fila['cantidad']);
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

    public static function AlertasImpVictima ($data)
    {
        $query = "SELECT count(id)as cantidad, rol, idUsuario FROM implicados
                  WHERE rol = 1
                  GROUP BY idUsuario, rol having cantidad >= ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$data]);
        $salida = [];

        while($datosImp = $stmt->fetch()) {
            $imp = new Implicado();
            $imp->cargarDatos($datosImp);
            $salida[] = $datosImp;
        }
        return $salida;
    }

    public static function AlertasImpVictimario ($data)
    {
        $query = "SELECT count(id)as cantidad, rol, idUsuario FROM implicados
                  WHERE rol = 2
                  GROUP BY idUsuario, rol having cantidad >= ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$data]);
        $salida = [];

        while($datosImp = $stmt->fetch()) {
            $imp = new Implicado();
            $imp->cargarDatos($datosImp);
            $salida[] = $datosImp;
        }

        return $salida;
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

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }



}
