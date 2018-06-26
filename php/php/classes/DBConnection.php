<?php

class DBConnection {

    private static $db = null;
    private function __construct() {}
    /**
     * Abre la conexión a la base de datos con PDO.
     */
    private static function openConnection()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $base = "DW4_NO_MAS_BULLYING";
        $dsn = "mysql:host=$host;dbname=$base;charset=utf8";

        self::$db = new PDO($dsn, $user, $pass);
    }

    /**
     * Retorna una conexión a la base de datos en modo Singleton.
     *
     * @return PDO
     */
    public static function getConnection()
    {
        if(is_null(self::$db)) {
            self::openConnection();
        }
        return self::$db;
    }

    /**
     * Retorna el PDOStatement para el $query proporcionado.
     *
     * @param string $query
     * @return PDOStatement
     */
    public static function getStatement($query)
    {
        return self::getConnection()->prepare($query);
    }

} 