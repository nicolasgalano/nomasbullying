<?php


/**
 * Class Categoria
 *
 * Esta clase maneja los datos y las consultas con la
 * tabla de Categorias.
 */
class Categoria
{
    private $id;
    private $categoria;

    /**
     * @return array
     */
    public static function traerTodos()
    {
        $query = "SELECT * FROM categorias";
        $stmt = DBConnection::getStatement($query);
        $stmt->execute();
        $salida = [];

        while($datosCat = $stmt->fetch()) {
            $cat = new Categoria();
            $cat->cargarDatos($datosCat);
            $salida[] = $cat;
        }

        return $salida;
    }

    /**
     * @param $datosCat
     */
    protected function cargarDatos($datosCat)
    {
        $this->setId($datosCat['id']);
        $this->setCategoria($datosCat['categoria']);
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
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


}