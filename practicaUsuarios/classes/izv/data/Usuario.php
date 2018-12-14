<?php

namespace izv\data;

use izv\tools\Tools;

 /**
  * Usuario Bulgaris o Root
  * 
  * @Entity @Table(name="usuario")
 **/
class Usuario{
    
    use \izv\common\Common;
    

    private $id ,$correo, $alias, $nombre, $clave, $activo = 0, $administrador = 0, $fechaalta;
    
    
    function __construct($id=null, $correo='', $alias='', $nombre="", $clave='', $activo=false, $fechaalta=null, $administrador=0){
        $this->id = $id;
        $this->correo = $correo; 
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->fechaalta = $fechaalta;
        $this->administrador = $administrador;
    }
    
    

    public function getId()
    {
        return $this->id;
    }


    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }


    public function getCorreo()
    {
        return $this->correo;
    }


    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }


    public function getAlias()
    {
        return $this->alias;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }


    public function getClave()
    {
        return $this->clave;
    }


    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

  
    public function getActivo()
    {
        return $this->activo;
    }


    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;

        return $this;
    }


    public function getAdministrador()
    {
        return $this->administrador;
    }

 
    public function setFechaalta($fechaalta)
    {
        $this->fechaalta = $fechaalta;

        return $this;
    }

   
    public function getFechaalta()
    {
        return $this->fechaalta->format('d-m-Y H:i:s');
    }
}