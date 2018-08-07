<?php
/**
 * Created by PhpStorm.
 * User: jpfra
 * Date: 6/8/2018
 * Time: 8:16 PM
 */

class Publicacion {

    private $id;
    private $creador;
    private $titulo;
    private $contenido;
    private $fecha;
    private $idtipos;

    protected function cargarDatos($fila)
    {
        $this->setId($fila['ID']);
        $this->setCreador($fila['creador']);
        $this->setTitulo($fila['titulo']);
        $this->setContenido($fila['contenido']);
        $this->setFecha($fila['fecha']);
        $this->setIdtipos($fila['idtipos']);
    }

    public static function buscarPorId($data)
    {
        $query = "SELECT * FROM publicaciones
                  WHERE ID = :id";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $datosPub = $stmt->fetch();
        return $datosPub;
    }

    public static function buscarPorId2($data)
    {
        $query = "SELECT * FROM publicaciones
                  WHERE ID = :id";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $salida = [];

        while($datos = $stmt->fetch()) {
            $sit = new Publicacion();
            $sit->cargarDatos($datos);
            $salida[] = $sit;
        }

        return $salida;
    }

    public static function buscarPorIdtipos($data)
    {
        $query = "SELECT * FROM publicaciones
                  WHERE idtipos = :id ORDER BY id DESC";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([
            'id' => $data
        ]);
        $salida = [];

        while($datos = $stmt->fetch()) {
            $sit = new Publicacion();
            $sit->cargarDatos($datos);
            $salida[] = $sit;
        }

        return $salida;

        $datosPub = $stmt->fetch();
        return $datosPub;
    }

    public static function crear($data)
    {
        $query = "INSERT INTO publicaciones (creador, titulo, contenido, fecha, idtipos)
                  VALUES (:cre, :tit, :con, NOW(), :tip)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'cre' => $data['creador'],
            'tit' => $data['titulo'],
            'con' => $data['contenido'],
            'tip' => $data['tipo'],
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
	              publicaciones
                  SET
                  creador = :cre,
	              titulo = :tit,
	              contenido = :con,
	              idtipos = :tip
                  WHERE ID = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'cre' => $data['creador'],
            'tit' => $data['titulo'],
            'con' => $data['contenido'],
            'tip' => $data['tipo'],
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
        $query = "DELETE FROM publicaciones
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
    public function getIdtipos()
    {
        return $this->idtipos;
    }

    /**
     * @param mixed $idtipos
     */
    public function setIdtipos($idtipos)
    {
        $this->idtipos = $idtipos;
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
