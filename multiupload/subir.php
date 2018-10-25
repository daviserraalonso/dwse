<?php



//solo se podrá usar si el método es post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //cargamos la clase multiupload
    require_once("Multiupload.php");
    //capturamos los campos file del formulario

    $files = $_FILES['archivos']['name'];

    //instanciamos la clase multiupload
    $upload = new Multiupload();
    //llamamos a la función upFiles y pasamos como parámetro
    // el array de archivos
    $isUpload = $upload->upFiles($files);
}else{
    throw new Exception("Error procesando peticion", 1);
}