<?php
require_once __DIR__ . "/Element.php";
class LabelElement extends Element
{
    /**
     * Texto de la etiqueta
     *
     * @var string
     */
    private $text;
    
    /**
     * Elemento del form al que va asociado la etiqueta
     *
     * @var Element
     */
    private $for;
    
    public function __construct(string $text, DataElement $for)
	{
        $this->text = $text;
        $this->for = $for;
        parent::__construct();
 
    }
    
    public function render(): string
    {
      return 
            "<label" . 
            (!empty($this->for) ? " for='{$this->for->getId()}' " : '') .
            $this->renderAttributes() .
            ">{$this->text}</label>";
    
    }
}