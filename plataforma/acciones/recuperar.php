<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
    die("nah nah nah...");

require '../autoload.php';


try {

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $usuario = Usuario::getIdByDNI($_POST['DNI']);

    $temporales = Temporal::buscarPorId($usuario->getID());
    if(count($temporales)>0){
        foreach($temporales as $temporal):
            Temporal::eliminar($temporal->getIdusuario());
        endforeach;
    }

    $new_pass = generateRandomString();
    $hashSecure = password_hash($new_pass, PASSWORD_DEFAULT);

    $result = Temporal::generarPassword($usuario->getID(), $hashSecure);

    $body = "Hola ". $usuario->getNombre() . "\r\n"
            . "Por medio de este mail te avisamos que tu contraseña ha sido renovada. \r\n"
            . "Contraseña Nueva Temporal: \r\n" . $new_pass;

    $headers = 'From: '. $usuario->getMail() . "\r\n" .
        'Reply-To: no-reply@nomasbullying.com.ar' . "\r\n";

    mail($usuario->getMail(), 'No Mas Bullying / Contacto', $body, $headers);

    echo json_encode($result);

} catch(Exception $e) {
    echo "Hubo un error en la recuperación de contraseña. Por favor intentalo de nuevo.";
}


?>
