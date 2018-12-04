<?php
     
     
    require '../classes/autoload.php';

    use izv\data\Usuario;
    use izv\database\Database;
    use izv\managedata\ManagerUsuario;
    use izv\tools\Reader;
    use izv\tools\Alert;
    use izv\tools\Util;
     use izv\sessions\Session;

    
    $database = new Database('usuariobd', 'clavebd', 'nombrebd', 'localhost');
    
    $manager = new ManagerUsuario($database);
    
    /*session_name('DWES_SESSION');
    session_start();*/
    
    
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    
   if(!empty($correo) && !empty($clave)){
    $sesion = new Session('USERS_SESION');
    $manager->login($correo, $clave);
    header('Location: ../panel/index.php');
   }else{
       echo 'mal';
       // header('Location: ../index.php');
   }
    
    