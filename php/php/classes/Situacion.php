<?php

class Situacion {

    private $id;
    private $denunciante;
    private $descripcion;
    private $fecha;
    private $nivel;

    public static function traerTodos($denunciante)
    {
        $query = "SELECT * FROM situaciones
                  WHERE denunciante = ?";
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

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setDenunciante($fila['denunciante']);
        $this->setDescripcion($fila['descripcion']);
        $this->setFecha($fila['fecha_creacion']);
        $this->setNivel($fila['nivel_situacion']);
    }

    public static function crear($data)
    {
        $query = "INSERT INTO situaciones (denunciante, descripcion, fecha_creacion, nivel_situacion)
                  VALUES (:den, :des, :fecha, :nivel)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'den' => $data['denunciante'],
            'des' => $data['descripcion'],
            'fecha' => $data['fecha_creacion'],
            'nivel' => $data['nivel_situacion'],
        ]);

        if(!$exito) {
            throw new Exception('Error al insertar los datos.');
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


} 