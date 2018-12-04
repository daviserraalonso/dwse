
<?php 
    
    $texto_mail = "prueba";
    $destino = "daviserraalonso@gmail.com";
    $asunto = "activacion";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: prueba de envio <daviserraalonso@gmail.com>\r\n";
    
    $exito = mail($destino, $asunto, $texto_mail, $headers);
    
    // si hay errores
    
    if($exito){
        echo "Mensaje enviado con exito";
    }else{
        echo "El mensaje no ha sido enviado";
    }