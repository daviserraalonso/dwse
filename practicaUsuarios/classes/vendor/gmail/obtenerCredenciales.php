<?php
    
    session_start();
    
    require_once '../autoload.php';
    
    $cliente = new Google_Client();
    
    $cliente->setApplicationName('correo');
    $cliente->setClientId('920693881810-qvaljlgeoqgnslhi9gidjke5duvoangq.apps.googleusercontent.com'); 
    $cliente->setClientSecret('qsSlGqP7m0iylYZBaYOIY3Om');
    $cliente->setRedirectUri('https://dwse-scorpions.c9users.io/practicaUsuarios/classes/vendor/gmail/obtenerCredenciales.php');
    
    
    $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
    $cliente->setAccessType('offline');
    if(isset($_GET['code'])){
        $cliente->authenticate($_GET['code']);
        $_SESSION['token'] = $cliente->getAccessToken();
        $archivo = "token.conf";
        $fh = fopen($archivo, 'w') or die("Error al crear el archivo de salida");
        fwrite($fh, json_encode($cliente->getAccessToken()));
        fclose($fh);
        header("Location: finalizarToken.php?code=" . $_GET['code']);
    }