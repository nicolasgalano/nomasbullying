<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 5/8/2018
 * Time: 5:16 PM
 */

class PadreNotificado {

    private $id;
    private $usuariosId;
    private $notificacionesId;

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setUsuariosId($fila['usuarios_ID']);
        $this->setNotificacionesId($fila['notificaciones_ID']);
    }

    public static function crear($data)
    {
        $query = "INSERT INTO sit_has_padre (usuarios_ID, notificaciones_ID)
                  VALUES (:usu, :noti)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'usu' => $data['usuarios_ID'],
            'noti' => $data['notificaciones_ID'],
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    public static function traerTodosId($id)
    {
        $query = "SELECT * FROM sit_has_padre
                  WHERE usuarios_ID = ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$id]);
        $salida = [];

        while($datosPnot = $stmt->fetch()) {
            $salida[] = $datosPnot;
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
    public function getNotificacionesId()
    {
        return $this->notificacionesId;
    }

    /**
     * @param mixed $notificacionesId
     */
    public function setNotificacionesId($notificacionesId)
    {
        $this->notificacionesId = $notificacionesId;
    }

    /**
     * @return mixed
     */
    public function getUsuariosId()
    {
        return $this->usuariosId;
    }

    /**
     * @param mixed $usuariosId
     */
    public function setUsuariosId($usuariosId)
    {
        $this->usuariosId = $usuariosId;
    }


} 