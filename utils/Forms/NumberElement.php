<?php
require_once __DIR__ . "/InputElement.php";
require_once __DIR__ . "/../Validator/NumberValidator.php";
class NumberElement extends InputElement
{

    public function __construct()
    {
        $this->setValidator(new NumberValidator("Número inválido", true));
        parent::__construct('number');
    }

}
