<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 5/8/2018
 * Time: 5:05 PM
 */

class Notificacion {

    private $id;
    private $contenido;
    private $fecha;
    private $rol;
    private $implicado;
    private $leido;

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setContenido($fila['contenido']);
        $this->setFecha($fila['fecha']);
        $this->setRol($fila['rol']);
        $this->setImplicado($fila['implicado']);
        $this->setLeido($fila['leido']);
    }

    public static function traerTodosId($id)
    {
        $query = "SELECT * FROM notificaciones
                  WHERE ID = ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$id]);
        $salida = [];

        while($datosNot = $stmt->fetch()) {
            $salida[] = $datosNot;
        }

        return $salida;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO notificaciones (contenido, fecha, rol, implicado, leido)
                  VALUES (:con, NOW(), :rol, :imp, 0)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'con' => $data['contenido'],
            'rol' => $data['rol'],
            'imp' => $data['implicado'],
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    public static function editar($data)
    {
        $query = "UPDATE
	              notificaciones
                  SET
                  contenido = :con,
	              rol = :rol,
	              implicado = :imp
                  WHERE ID = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'con' => $data['contenido'],
            'rol' => $data['rol'],
            'imp' => $data['implicado'],
            'id'  => $data['ID']
        ]);

        if(!$exito) {
            return 'Error al editar los datos.';
        }else{
            return true;
        }
    }

    public static function eliminar($data)
    {
        $query = "DELETE FROM notificaciones
                  WHERE ID = :id
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'id' => $data['ID']
        ]);

        if(!$exito) {
            throw new Exception('Error al eliminar los datos.');
        }
    }



    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getImplicado()
    {
        return $this->implicado;
    }

    /**
     * @param mixed $implicado
     */
    public function setImplicado($implicado)
    {
        $this->implicado = $implicado;
    }

    /**
     * @return mixed
     */
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * @param mixed $leido
     */
    public function setLeido($leido)
    {
        $this->leido = $leido;
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