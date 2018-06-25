<?php


/**
 * Class Comentario
 *
 * Esta clase maneja los datos y las consultas con la
 * tabla de Comentarios.
 */
class Comentario
{
    private $id;
    private $titulo;
    private $comentario;
    private $titulo_juego;
    private $fkusuarios;
    private $fkcategorias;

    /**
     * @return array
     */
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

    /**
     * @param $data
     * @return array
     */
    public static function traerUno($data)
    {
        $query = "SELECT * FROM comentarios WHERE id = ? LIMIT 1";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute([$data]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $comment = new Comentario;
        $comment->cargarDatos($fila);
        return $comment;
    }

    /**
     * @param $datosCom
     */
    protected function cargarDatos($datosCom)
    {
        $this->setId($datosCom['id']);
        $this->setTitulo($datosCom['titulo']);
        $this->setComentario($datosCom['comentario']);
        $this->setTituloJuego($datosCom['titulo_juego']);
        $this->setFkusuarios($datosCom['fkusuarios']);
        $this->setFkcategorias($datosCom['fkcategorias']);
    }

    /**
     * @param $data
     * @throws Exception
     */
    public static function crear($data)
    {
        $query = "INSERT INTO comentarios (titulo, comentario, titulo_juego, fkusuarios, fkcategorias)
                  VALUES (:tit, :comentario, :juego, :usuario, :cat)";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'tit' => $data['titulo'],
            'comentario' => $data['comentario'],
            'juego' => $data['juego'],
            'usuario' => $data['fkusuario'],
            'cat' => $data['categoria'],
        ]);

        if(!$exito) {
            throw new Exception('Error al insertar los datos.');
        }
    }

    public static function editar($data)
    {
        $query = "UPDATE
	              comentarios
                  SET
                  titulo = :tit,
	              comentario = :comentario,
	              titulo_juego = :juego,
	              fkusuarios = :usuario,
	              fkcategorias = :cat
                  WHERE id = :id LIMIT 1";

        $stmt = DBConnection::getStatement($query);

        $exito = $stmt->execute([
            'tit' => $data['titulo'],
            'comentario' => $data['comentario'],
            'juego' => $data['juego'],
            'usuario' => $data['fkusuario'],
            'cat' => $data['categoria'],
            'id' => $data['id'],
        ]);

        if(!$exito) {
            throw new Exception('Error al editar los datos.');
        }
    }

    /**
     * @param $data
     * @throws Exception
     */
    public static function eliminar($data)
    {
        $query = "DELETE FROM comentarios
                  WHERE id = ?
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

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getTituloJuego()
    {
        return $this->titulo_juego;
    }

    /**
     * @param mixed $titulo_juego
     */
    public function setTituloJuego($titulo_juego)
    {
        $this->titulo_juego = $titulo_juego;
    }

    /**
     * @return mixed
     */
    public function getFkusuarios()
    {
        return $this->fkusuarios;
    }

    /**
     * @param mixed $fkusuarios
     */
    public function setFkusuarios($fkusuarios)
    {
        $this->fkusuarios = $fkusuarios;
    }

    /**
     * @return mixed
     */
    public function getFkcategorias()
    {
        return $this->fkcategorias;
    }

    /**
     * @param mixed $fkcategorias
     */
    public function setFkcategorias($fkcategorias)
    {
        $this->fkcategorias = $fkcategorias;
    }


}