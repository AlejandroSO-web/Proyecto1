<?php 
require_once __DIR__ . '/Entity.php';

class Asociado extends Entity
{
    const RUTA_IMAGENES_ASOCIADO = 'images/index/';

    /**
     * @var string
     * 
     */

     private $id;
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $asunto;

    /**
     * @var string
     */
    private $email;
   
    /**
     * @var string
     */
    private $texto;

    /**
     * @var string
     */
    private $fecha;



    /**
     * @param string $id
     * @param string $nombre
     * @param string $apellidos
     * @param string $asunto
     * @param string $email
     * @param string $texto
     * @param string $fecha
     * 
     */
    public function __construct(string $nombre="", string $apellidos="", string $asunto = "",string $email="", string $texto="" , string $fecha=""){
        $this->id=null;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }



    /**
     * Devuelve el path a las imágenes del asociado
     *
     * @return string
     */
    public function getUrlImagen() : string
    {
        return self::RUTA_IMAGENES_ASOCIADO . $this->getLogo();
    }

    public function  toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'asunto' => $this->getAsunto(),
            'email' => $this->getEmail(),
            'texto' => $this->getTexto(),
            'fecha' => $this->getFecha()
        ];
    }

     /**
      * Get the value of id
      */ 
     public function getId()
     {
          return $this->id;
     }

     /**
      * Set the value of id
      *
      * @return  self
      */ 
     public function setId($id)
     {
          $this->id = $id;

          return $this;
     }

    /**
     * Get the value of apellidos
     *
     * @return  string
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @param  string  $apellidos
     *
     * @return  self
     */ 
    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of asunto
     *
     * @return  string
     */ 
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set the value of asunto
     *
     * @param  string  $asunto
     *
     * @return  self
     */ 
    public function setAsunto(string $asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of texto
     *
     * @return  string
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @param  string  $texto
     *
     * @return  self
     */ 
    public function setTexto(string $texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of fecha
     *
     * @return  string
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @param  string  $fecha
     *
     * @return  self
     */ 
    public function setFecha(string $fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}
