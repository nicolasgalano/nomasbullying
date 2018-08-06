<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 6/8/2018
 * Time: 8:09 PM
 */

class Temporal {

    private $id;
    private $idusuario;
    private $password;

    public static function buscarPorId($data)
    {
        $query = "SELECT * FROM temporal
                  WHERE idusuario = :id";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $datosUsu = $stmt->fetch();
        return $datosUsu;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['id']);
        $this->setIdusuario($fila['idusuario']);
        $this->setPassword($fila['password']);
    }

    public static function generar($data)
    {
        $query = "INSERT INTO temporal (idusuario, password)
                  VALUES (:usu, :pass)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'usu' => $data['idusuario'],
            'pass' => $data['password'],
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            return true;
        }
    }

    public static function eliminar($data)
    {
        $query = "DELETE FROM temporal
                  WHERE idusuario = :id
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'id' => $data['idusuario']
        ]);

        if(!$exito) {
            throw new Exception('Error al eliminar los datos.');
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
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


} 