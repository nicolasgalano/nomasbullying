<?php

class Situacion {

    private $id;
    private $denunciante;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $nivel;
    private $estatus;

    public static function getIdByLastEntry()
    {
        $query = "SELECT id FROM situaciones ORDER BY ID DESC LIMIT 1";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();

        $datosSit = $stmt->fetch();
        return $datosSit['id'];
    }

    public static function getCountNotRead()
    {
        $query = "SELECT * FROM situaciones
                  WHERE estatus = 0 ORDER BY id DESC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosSit = $stmt->fetch()) {
            $sit = new Situacion();
            $sit->cargarDatos($datosSit);
            $salida[] = $sit;
        }

        return $salida;
    }

    public static function traerTodosId($denunciante)
    {
        $query = "SELECT * FROM situaciones
                  WHERE denunciante = ? ORDER BY id DESC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$denunciante]);
        $salida = [];

        while($datosSit = $stmt->fetch()) {
            $sit = new Situacion();
            $sit->cargarDatos($datosSit);
            $salida[] = $sit;
        }

        return $salida;
    }

    public static function getByID($idSituacion)
    {
        $query = "SELECT * FROM situaciones
                  WHERE id = ?";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$idSituacion]);
        $salida = [];

        while($datosSit = $stmt->fetch()) {
            $salida[] = $datosSit;
        }

        return $salida;
    }

    public static function traerTodos($orderBy)
    {
        $query = "SELECT * FROM situaciones ORDER BY id DESC";//+$orderBy;
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosSit = $stmt->fetch()) {
            $sit = new Situacion();
            $sit->cargarDatos($datosSit);
            $salida[] = $sit;
        }

        return $salida;
    }

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setDenunciante($fila['denunciante']);
        $this->setTitulo($fila['titulo']);
        $this->setDescripcion($fila['descripcion']);
        $this->setFecha($fila['fecha_creacion']);
        $this->setNivel($fila['nivel_situacion']);
        $this->setEstatus($fila['estatus']);
    }

    public static function crear($data)
    {
        $query = "INSERT INTO situaciones (denunciante, titulo, descripcion, fecha_creacion, nivel_situacion, estatus)
                  VALUES (:den, :tit, :des, NOW(), :nivel, 'No Leído')";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'den' => $data['denunciante'],
            'tit' => $data['titulo'],
            'des' => $data['descripcion'],
            'nivel' => $data['nivel_situacion'],
        ]);

        if(!$exito) {
            return 'Error al insertar los datos.';
        }else{
            //TENGO QUE DEVOLVER EL ID DE SITUACION
            $idSituacion = Situacion::getIdByLastEntry();
            return $idSituacion;
        }
    }

    public static function editarEstatus($data)
    {
        $query = "UPDATE
	              situaciones
                  SET
                  estatus = 1
                  WHERE ID = ".$data." LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute();

        if(!$exito) {
            return 'Error al editar los datos.';
        }else{
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function getDenunciante()
    {
        return $this->denunciante;
    }

    /**
     * @param mixed $denunciante
     */
    public function setDenunciante($denunciante)
    {
        $this->denunciante = $denunciante;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }


}
