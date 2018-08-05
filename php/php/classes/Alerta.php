<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 5/8/2018
 * Time: 10:13 AM
 */

class Alerta {

    private $id;
    private $cantidad;
    private $rol;

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setCantidad($fila['cantidad']);
        $this->setRol($fila['rol']);
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM alerta_config";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosAle = $stmt->fetch()) {
            $ale = new Alerta();
            $ale->cargarDatos($datosAle);
            $salida[] = $ale;
        }

        return $salida;
    }

    public static function editar($data)
    {
        $query = "UPDATE
	              alerta_config
                  SET
                  cantidad = :can,
	              rol = :rol
                  WHERE ID = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'can' => $data['cantidad'],
            'rol' => $data['rol']
        ]);

        if(!$exito) {
            return 'Error al editar los datos.';
        }else{
            return true;
        }
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