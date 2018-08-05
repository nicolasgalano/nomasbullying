<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 4/8/2018
 * Time: 8:05 PM
 */

class Susuario {
    private $id;
    private $nombre;
    private $apellido;
    private $password;
    private $mail;
    private $identificacion;

    public static function buscarPorUsuarioId($data)
    {
        $query = "SELECT * FROM usuarios
                  WHERE id = :id";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $datosUsu = $stmt->fetch();
        return $datosUsu;
    }

    public static function buscarPorUsuario($usuario)
    {
        $query = "SELECT * FROM usuarios
                  WHERE identificacion = ?
                  LIMIT 1";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute([$usuario]);
        if($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new Susuario;
            $user->cargarDatos($fila);
            return $user;
        }
        return null;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['id']);
        $this->setNombre($fila['nombre']);
        $this->setApellido($fila['apellido']);
        $this->setPassword($fila['password']);
        $this->setMail($fila['mail']);
        $this->setIdentificacion($fila['identificacion']);
    }

    public static function traerTodos()
    {
        $query = "SELECT * FROM usuarios ORDER BY id DESC";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosUsu = $stmt->fetch()) {
            $usu = new Susuario();
            $usu->cargarDatos($datosUsu);
            $salida[] = $usu;
        }

        return $salida;
    }

    public static function getAll()
    {
        $query = "SELECT id, nombre, apellido FROM usuarios";
        $stmt = DBConnectionSA::getStatement($query);
        $stmt->execute();
        $salida = [];
        while($datosUsu = $stmt->fetch()) {
            $salida[] = $datosUsu;
        }
        return $salida;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO usuarios (nombre, apellido, password, mail, identificacion)
                  VALUES (:nom, :ape, :pass, :mail, :iden)";

        $stmt = DBConnectionSA::getStatement($query);

        $hashSecure = password_hash($data['password'], PASSWORD_DEFAULT);

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'pass' => $hashSecure,
            'mail' => $data['mail'],
            'iden' => $data['identificacion'],
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
	              usuarios
                  SET
                  nombre = :nom,
	              apellido = :ape,
	              password = :pass,
	              mail = :mail,
	              identificacion = :iden
                  WHERE id = :id LIMIT 1";

        $stmt = DBConnectionSA::getStatement($query);

        if($data['password-new'] != ''){
            $hashSecure = password_hash($data['password-new'], PASSWORD_DEFAULT);
        }else{
            $hashSecure = $data['password-old'];
        }

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'pass' => $hashSecure,
            'mail' => $data['mail'],
            'iden' => $data['identificacion'],
            'id' => $data['id'],
        ]);

        if(!$exito) {
            return 'Error al editar los datos.';
        }else{
            return true;
        }
    }

    public static function eliminar($data)
    {
        $query = "DELETE FROM usuarios
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