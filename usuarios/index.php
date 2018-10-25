<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php 
            $ruta = '/home/ubuntu/privado';
            $listado = shell_exec('ls ' . $ruta);
            $user = explode(".jpg", $listado);
            
            for($i=0;$i<count($user);$i++){
                echo '<p><a href="read.php?archivo='.trim($user[$i]).'.jpg" target="_onblank">'.trim($user[$i]).'</a></p>';
            }
        ?>
        <a href="principal.html">volver y añadir</a>
    </body>
</html>