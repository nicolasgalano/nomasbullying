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
    private $edad;
    private $grado;
    private $sexo;

    public static function buscarPorUsuarioId($data)
    {
        $query = "SELECT * FROM usuarios
                  WHERE ID = :id";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $datosUsu = $stmt->fetch();
        $usu = new Usuario();
        $usu->cargarDatos($datosUsu);
        return $usu;
    }

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
        $this->setEdad($fila['edad']);
        $this->setGrado($fila['grado']);
        $this->setSexo($fila['sexo']);
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
        $query = "INSERT INTO usuarios (nombre, apellido, tipo, password, mail, identificacion, idnacionalidad, edad, grado, sexo)
                  VALUES (:nom, :ape, :tipo, :pass, :mail, :iden, :nac, :edad, :gra, :sex)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'tipo' => $data['tipo'],
            'pass' => $data['password'],
            'mail' => $data['mail'],
            'iden' => $data['identificacion'],
            'nac' => $data['idnacionalidad'],
            'edad' => $data['edad'],
            'gra' => $data['grado'],
            'sex' => $data['sexo'],
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
	              tipo = :tipo,
	              pass = :pass,
	              mail = :mail,
	              identificacion = :iden,
	              idnacionalidad = :nac,
	              edad = :edad,
	              grado = :gra,
	              sexo = :sex
                  WHERE ID = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'nom' => $data['nombre'],
            'ape' => $data['apellido'],
            'tipo' => $data['tipo'],
            'pass' => $data['password'],
            'mail' => $data['mail'],
            'iden' => $data['identificacion'],
            'nac' => $data['idnacionalidad'],
            'id' => $data['id'],
            'edad' => $data['edad'],
            'gra' => $data['grado'],
            'sex' => $data['sexo'],
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
                  WHERE ID = :id
                  LIMIT 1";

        $stmt = DBConnection::getStatement($query);

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

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    /**
     * @return mixed
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * @param mixed $grado
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

}
