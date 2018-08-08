<?php

/**
 * Class Auth
 *
 * Se encarga del manejo de la autenticación.
 */
class Auth
{
    /**
     * Intenta autenticar un usuario.
     *
     * @param string $usuario
     * @param string $password
     * @return bool
     */
    public static function login($usuario, $password)
    {
        $usuario = Usuario::buscarPorUsuario($usuario);

        if($usuario) {

            $passwordU = '';
            $temporales = Temporal::buscarPorId($usuario->getID());

            if(count($temporales)>0){

                $passwordU = $temporales[0]->getPassword();

            }else{

                $passwordU = $usuario->getPassword();
            }

            if(password_verify($password, $passwordU )) {
                self::logUser($usuario);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Loguea un usuario.
     *
     * @param $usuario
     */
    protected static function logUser($usuario)
    {
        $_SESSION['user'] = $usuario;
    }

    /**
     * Cierra la sesión.
     */
    public static function logout()
    {
        unset($_SESSION['user']);
    }

    /**
     * @return Usuario
     */
    public static function getUser()
    {
        return $_SESSION['user'];
    }

    /**
     * Indica si el usuario está logueado o no.
     *
     * @return bool
     */
    public static function userLogged()
    {
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
}
