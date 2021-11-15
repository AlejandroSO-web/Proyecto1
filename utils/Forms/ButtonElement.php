<?php
require_once __DIR__ . "/Element.php";
class ButtonElement extends DataElement
{
    /**
     * Texto del botón
     *
     * @var string
     */
    private $text;
    
    public function __construct(string $text)
	{
        $this->text = $text;
        parent::__construct();
    }

    public function render(): string
    {
       return 
            "<button type='submit'" . 
                (!empty($this->name) ? " name='$this->name' " : '') .
                $this->renderAttributes() . 
            ">{$this->text}</button>";
       
    }
}