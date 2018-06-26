<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 25/6/2018
 * Time: 5:48 PM
 */

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $tipo;
    private $password;
    private $mail;
    private $identificacion;
    private $nacionalidad;

    public static function buscarPorUsuario($usuario)
    {
        $query = "SELECT * FROM usuarios
                  WHERE identificacion = ?
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

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setNombre($fila['nombre']);
        $this->setApellido($fila['apellido']);
        $this->setTipo($fila['tipo']);
        $this->setPassword($fila['password']);
        $this->setMail($fila['mail']);
        $this->setIdentificacion($fila['identificacion']);
        $this->setNacionalidad($fila['idnacionalidad']);
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM usuarios";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosUsu = $stmt->fetch()) {
            $usu = new Usuario();
            $usu->cargarDatos($datosUsu);
            $salida[] = $usu;
        }

        return $salida;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO usuarios (nombre, apellido, tipo, password, mail, identificacion, idnacionalidad)
                  VALUES (:nom, :ape, :tipo, :pass, :mail, :iden, :nac)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'tipo' => $data['tipo'],
            'pass' => $data['password'],
            'mail' => $data['mail'],
            'iden' => $data['identificion'],
            'nac' => $data['idnacionalidad'],
        ]);

        if(!$exito) {
            throw new Exception('Error al insertar los datos.');
        }
    }

    public static function editar($data)
    {
        $query = "UPDATE
	              usuarios
                  SET
                  nombre = :nom,
	              apellido = :ape,
	              tipo = :tipo,
	              pass = :pass,
	              mail = :mail,
	              identificacion = :iden,
	              idnacionalidad = :nac
                  WHERE ID = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'tipo' => $data['tipo'],
            'pass' => $data['password'],
            'mail' => $data['mail'],
            'iden' => $data['identificion'],
            'nac' => $data['idnacionalidad'],
            'id' => $data['ID'],
        ]);

        if(!$exito) {
            throw new Exception('Error al editar los datos.');
        }
    }

    public static function eliminar($data)
    {
        $query = "DELETE FROM usuarios
                  WHERE ID = ?
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([$data]);

        if(!$exito) {
            throw new Exception('Error al eliminar los datos.');
        }
    }
    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
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
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed $identificacion
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * @param mixed $nacionalidad
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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