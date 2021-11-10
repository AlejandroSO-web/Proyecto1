<?php
require_once __DIR__ . "/DataElement.php";
class TextareaElement extends DataElement
{
    public function render(): string
    {
        $html = "<textarea name='{$this->name}'";
        $html .= $this->renderAttributes();
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $html .= '>' . $this->getValue();
        } else {
            $html .= ">{$this->defaultValue}";
        }
        $html .= '</textarea>';

       return $html;
    
    }
}