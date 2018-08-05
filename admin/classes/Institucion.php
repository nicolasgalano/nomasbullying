<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 4/8/2018
 * Time: 8:16 PM
 */

class Institucion {

    private $id;
    private $institucion;
    private $nombre;
    private $sdominio;
    private $fecha;
    private $estado;


    protected function cargarDatos($fila)
    {
        $this->setId($fila['id']);
        $this->setInstitucion($fila['institucion']);
        $this->setNombre($fila['nombre']);
        $this->setSdominio($fila['sdominio']);
        $this->setFecha($fila['fecha_ins']);
        $this->setEstado($fila['estado']);
    }

    public static function buscarPorId($data)
    {
        $query = "SELECT * FROM instituciones
                  WHERE id = :id";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $datosUsu = $stmt->fetch();
        return $datosUsu;
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM instituciones ORDER BY id DESC";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosIns = $stmt->fetch()) {
            $Ins = new Institucion();
            $Ins->cargarDatos($datosIns);
            $salida[] = $Ins;
        }

        return $salida;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO instituciones (institucion, nombre, sdominio, fecha_ins, estado)
                  VALUES (:ins, :nom, :sdom, NOW(), :est)";

        $stmt = DBConnectionSA::getStatement($query);

        $exito = $stmt->execute([
            'ins' => $data['institucion'],
            'nom' => $data['nombre'],
            'sdom' => $data['sdominio'],
            'est' => $data['estado'],
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
	              instituciones
                  SET
                  institucion = :ins,
                  nombre = :nom,
	              sdominio = :sdom,
                  fecha_ins = :fecha,
	              estado = :est
                  WHERE id = :id LIMIT 1";

        $stmt = DBConnectionSA::getStatement($query);

        $exito = $stmt->execute([
            'id' => $data['id'],
            'ins' => $data['institucion'],
            'nom' => $data['nombre'],
            'sdom' => $data['sdominio'],
            'est' => $data['estado'],
            'fecha' => $data['fecha_ins'],
        ]);

        if(!$exito) {
            return 'Error al editar los datos.';
        }else{
            return true;
        }
    }

    public static function eliminar($data)
    {
        $query = "DELETE FROM instituciones
                  WHERE id = :id
                  LIMIT 1";

        $stmt = DBConnectionSA::getStatement($query);

        $exito = $stmt->execute([
            'id' => $data['id']
        ]);

        if(!$exito) {
            throw new Exception('Error al eliminar los datos.');
        }
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * @param mixed $institucion
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getSdominio()
    {
        return $this->sdominio;
    }

    /**
     * @param mixed $sdominio
     */
    public function setSdominio($sdominio)
    {
        $this->sdominio = $sdominio;
    }


}
