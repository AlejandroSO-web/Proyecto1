<?php
require_once __DIR__ . "./../LabelElement.php";
require_once __DIR__ . "./../DivElement.php";
require_once __DIR__ . "./../CompoundElement.php";

class MyFormControl extends CompoundElement
{
    private $container;
    public $formElement;
    public function __construct(Element $formElement, $label, $cssClass = 'col-xs-6'){
        $this->formElement = $formElement;
        $this->formElement->setCssClass('form-control');

        $this->container = new DivElement();
        $this->container->setCssClass($cssClass);
      
        $label = new LabelElement($label, $formElement);
        $label->setCssClass("label-control");
        $this->container
            ->appendChild($label)
            ->appendChild($formElement);
        
        $this->appendChild($this->container);
                    
    }
    public function render(): string{
        return $this->container->render();
    }
    public function validate(){
        $this->formElement->validate();
    }
    public function hasError(): bool{
        return $this->formElement->hasError();
    }
    public function getErrors(): array
    {
        return $this->formElement->getErrors();
    }
 
}