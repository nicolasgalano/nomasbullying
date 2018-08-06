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
    private $padre;

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setContenido($fila['contenido']);
        $this->setFecha($fila['fecha']);
        $this->setRol($fila['rol']);
        $this->setImplicado($fila['implicado']);
        $this->setLeido($fila['leido']);
        $this->setPadre($fila['padre']);
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM notificaciones ORDER BY id DESC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosSit = $stmt->fetch()) {
            $sit = new Notificacion();
            $sit->cargarDatos($datosSit);
            $salida[] = $sit;
        }

        return $salida;
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

    public static function traerTodosIdPadre($id)
    {
        $query = "SELECT * FROM notificaciones
                  WHERE padre = ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$id]);
        $salida = [];

        while($datosNot = $stmt->fetch()) {
            $sit = new Notificacion();
            $sit->cargarDatos($datosNot);
            $salida[] = $sit;
        }

        return $salida;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO notificaciones (rol, implicado, leido, padre)
                  VALUES (:rol, :imp, 0, :pad)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'rol' => $data['rol'],
            'imp' => $data['alumno'],
            'pad' => $data['padre'],
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
            'id' => $data['id']
        ]);

        if(!$exito) {
            return 'Error al eliminar los datos.';
        }else{
            return true;
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

    /**
     * @return mixed
     */
    public function getPadre()
    {
        return $this->padre;
    }

    /**
     * @param mixed $padre
     */
    public function setPadre($padre)
    {
        $this->padre = $padre;
    }



}
