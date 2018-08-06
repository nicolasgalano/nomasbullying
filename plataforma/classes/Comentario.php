<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 26/6/2018
 * Time: 1:49 PM
 */

class Comentario {

    private $id;
    private $creador;
    private $contenido;
    private $fecha;
    private $idsituacion;
    private $idpublicacion;
    private $idnotificacion;
    private $estado;

    public static function traerTodosId($situacion)
    {
        $query = "SELECT * FROM comentarios
                  WHERE idSituacion = ?
                  ORDER BY fecha ASC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$situacion]);
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $salida[] = $datosCom;
        }

        return $salida;
    }

    public static function traerTodosIdNot($situacion)
    {
        $query = "SELECT * FROM comentarios
                  WHERE idNotificacion = ?
                  ORDER BY fecha ASC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$situacion]);
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $salida[] = $datosCom;
        }

        return $salida;
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM comentarios";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $com = new Comentario();
            $com->cargarDatos($datosCom);
            $salida[] = $com;
        }

        return $salida;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setCreador($fila['creador']);
        $this->setContenido($fila['contenido']);
        $this->setFecha($fila['fecha']);
        $this->setIdsituacion($fila['idSituacion']);
        $this->setIdpublicacion($fila['idPublicacion']);
        $this->setIdnotificacion($fila['idNotificacion']);
        $this->setEstado($fila['estado']);

    }

    public static function crearS($creador,$contenido,$idSituacion)
    {
        $query = "INSERT INTO comentarios (creador, contenido, fecha, idSituacion)
                  VALUES (:cre, :con, NOW(), :sit)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'cre' => $creador,
            'con' => $contenido,
            'sit' => $idSituacion
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    public static function crearN($creador,$contenido,$idNotificacion)
    {
        $query = "INSERT INTO comentarios (creador, contenido, fecha, idNotificacion)
                  VALUES (:cre, :con, NOW(), :noi)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'cre' => $creador,
            'con' => $contenido,
            'noi' => $idNotificacion
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    public static function crearP($data)
    {
        $query = "INSERT INTO comentarios (creador, contenido, fecha, idPublicacion)
                  VALUES (:cre, :con, NOW(), :pub)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'cre' => $data['creador'],
            'con' => $data['contenido'],
            'pub' => $data['idPublicacion'],
        ]);

        if(!$exito) {
            throw new Exception('Error al insertar los datos.');
        }
    }

    public static function noLeidosSit($idSituacion, $idCreador)
    {
        $query = "SELECT * FROM comentarios
                  WHERE idSituacion = :idS AND creador <> :idU AND estado = 0 ORDER BY id ASC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'idS' => $idSituacion,
            'idU' => $idCreador,
        ]);
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $com = new Comentario();
            $com->cargarDatos($datosCom);
            $salida[] = $com;
        }

        return $salida;
    }

    public static function noLeidosNot($idNotificacion, $idCreador)
    {
        $query = "SELECT * FROM comentarios
                  WHERE idNotificacion = :idN AND creador <> :idU AND estado = 0 ORDER BY id ASC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'idN' => $idNotificacion,
            'idU' => $idCreador,
        ]);
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $com = new Comentario();
            $com->cargarDatos($datosCom);
            $salida[] = $com;
        }

        return $salida;
    }

    public static function noLeidosPub($data)
    {
        $query = "SELECT * FROM comentarios
                  WHERE idPublicacion = :idP AND creador <> :idU AND estado = 0";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'idP' => $data['idPublicacion'],
            'idU' => $data['creador'],
        ]);
        $salida = [];

        while($datosCom = $stmt->fetch()) {
            $com = new Comentario();
            $com->cargarDatos($datosCom);
            $salida[] = $com;
        }

        return $salida;
    }

    public static function marcarComoLeidoSit($idSituacion, $idCreador)
    {
        $query = "UPDATE
	              comentarios
                  SET
                  estado = 1
                  WHERE idSituacion = :idS AND creador <> :idU AND estado = 0
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $stmt->execute([
            'idS' => $idSituacion,
            'idU' => $idCreador,
        ]);

    }

    public static function marcarComoLeidoNot($idNotificacion, $idCreador)
    {
        $query = "UPDATE
	              comentarios
                  SET
                  estado = 1
                  WHERE idNotificacion = :idN AND creador <> :idU AND estado = 0
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $stmt->execute([
            'idN' => $idNotificacion,
            'idU' => $idCreador,
        ]);

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
    public function getIdnotificacion()
    {
        return $this->idnotificacion;
    }

    /**
     * @param mixed $idnotificacion
     */
    public function setIdnotificacion($idnotificacion)
    {
        $this->idnotificacion = $idnotificacion;
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
    public function getCreador()
    {
        return $this->creador;
    }

    /**
     * @param mixed $creador
     */
    public function setCreador($creador)
    {
        $this->creador = $creador;
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
    public function getIdpublicacion()
    {
        return $this->idpublicacion;
    }

    /**
     * @param mixed $idpublicacion
     */
    public function setIdpublicacion($idpublicacion)
    {
        $this->idpublicacion = $idpublicacion;
    }

    /**
     * @return mixed
     */
    public function getIdsituacion()
    {
        return $this->idsituacion;
    }

    /**
     * @param mixed $idsituacion
     */
    public function setIdsituacion($idsituacion)
    {
        $this->idsituacion = $idsituacion;
    }


}
