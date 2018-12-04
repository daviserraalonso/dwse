<?php

    require '../classes/autoload.php';
    
    use izv\data\Usuario;
    use izv\database\Database;
    use izv\managedata\ManagerUsuario;
    use izv\tools\Reader;
    use izv\tools\Util;
    
    $db = new Database();
    $manager = new ManagerUsuario($db);
    $usuario = Reader::readObject('izv\data\Usuario');
    
    if($usuario->getAlias() === '') {
        $usuario->setAlias(null);
    }
    
    $usuario->setClave(Util::encriptar($usuario->getClave()));
    
    //echo Util::varDump($usuario);
    $resultado = $manager->add($usuario);
    
    //si usamos estas dos líneas podemos mostrar los errores en la BD
    echo Util::varDump($db->getConnection()->errorInfo()); //-> mostraria el error en la conexion
    echo Util::varDump($db->getSentence()->errorInfo()); //-> mostraria el error en la sentencia
    
    $db->close();
    $url = 'index.php?op=insertusuario&resultado=' . $resultado;
    header('Location: ' . $url);