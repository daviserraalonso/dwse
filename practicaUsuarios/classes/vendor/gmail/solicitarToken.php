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
    
    if(!$cliente->getAccessToken()){
        $auth = $cliente->createAuthUrl();
        header("Location: $auth");
    }