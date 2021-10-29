<?php
class Asociado{

    const RUTA_IMAGENES_Asociados = 'images/index/';

    /** 
    *@var string
    */
    private $nombre;

    /** 
    *@var string
    */
    private $logo;

    /** 
    *@var string
    */
    private $descripcion;

    public function __construct(string $nombre,string $logo, string $descripcion ="" )
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * Get *@var string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set *@var string
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get *@var string
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set *@var string
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get *@var string
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set *@var string
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}