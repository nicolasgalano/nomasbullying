<?php

/**
 * Class Usuario
 *
 * Esta clase maneja los datos y las consultas con la
 * tabla de usuarios.
 */
class Usuario
{
    private $id;
    private $usuario;
    private $password;

    /**
     * Retorna un Usuario por su "usuario", null de no
     * existir.
     *
     * @param $usuario
     * @return null|Usuario
     */
    public static function buscarPorUsuario($usuario)
    {
        $query = "SELECT * FROM usuarios
                  WHERE usuario = ?
                  LIMIT 1";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$usuario]);
        if($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new Usuario;
            $user->cargarDatos($fila);
            return $user;
        }
        return null;
    }

    /**
     * Carga todos los datos válidos del array en las
     * propiedades correspondientes.
     *
     * @param $fila
     */
    protected function cargarDatos($fila)
    {
        $this->setId($fila['id']);
        $this->setUsuario($fila['usuario']);
        $this->setPassword($fila['password']);
    }

    /**** SETTERS & GETTERS ****/
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
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