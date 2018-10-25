<?php

class Multiupload{
    
    public function upFiles($files = array()){
       // contador para recorrer los archivos
        $i = 0;
        
        //creamos el directorio de subidas si no existe
        if(!is_dir("Subidas/")){
            mkdir("Subidas/", 0777);
        }
        
        //recorrermos los inputs del formulario
          foreach($files as $file){
            //si se está subiendo algún archivo en ese indice
            if($_FILES['archivos']['tmp_name'][$i]){
                //separamos los trozos del archivo, nombre extension
                $partes[$i] = explode(".", $_FILES["archivos"]["name"][$i]);
 
                //obtenemos la extension
                $extension[$i] = end($partes[$i]);
 
                //si la extensión es una de las permitidas
                if($this->checkExtension($extension[$i]) === TRUE){
 
                    //comprobamos si el archivo existe o no, si existe renombramos
                    //para evitar que sean eliminados
                    $_FILES['archivos']['name'][$i] = $this->checkExists($partes[$i]);            
 
                    //comprobamos si el archivo ha subido
                    if(move_uploaded_file($_FILES['archivos']['tmp_name'][$i],"Subidas/".$_FILES['archivos']['name'][$i])){
                        echo "subida correctamente";
                        //aqui podemos procesar info de la bd referente a este archivo
                    }
                //si la extension no es una de las permitidas
                }else{
                    echo "la extension no esta permitida";
                }
            //si ese input file no ha sido cargado con un archivo
            }else{
                echo "sin imagen";
            }
            echo "<br />";
            //en cada pasada por el loop incrementamos i para acceder al siguiente archivo
            $i++;    
        }    
    }
    
    private function checkExtension($extension){
        $extensiones = array("jpg", "png", "gif", "pdf", "docx");
        // la función in_array comprueba si existe en el array
        if(in_array(strtolower($extension), $extensiones)){
            return true;
        }else{
            return false;
        }
    }

    private function checkExists($file){
        //asignamos un nuevo nombre en casoi de que exista el fichero
        $archivo = $file[0] .'.'.end($file);
        $i = 0;
        //si existe el archivo entramos en el ciclo
        while(file_exists("Subidas/".$archivo)){
            $i++;
            $archivo = $file[0]."(".Si.")".".".end($file);
        }
        //devolvemos el nuevo nombre, si es que ha entrado en el ciclo alguna vez
        return $archivo;
    }
    // fin de la clase
}

