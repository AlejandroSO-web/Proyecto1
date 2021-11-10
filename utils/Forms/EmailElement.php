<?php
require_once __DIR__ . "/InputElement.php";
require_once __DIR__ . "/../Validator/EmailValidator.php";
class EmailElement extends InputElement
{

    public function __construct()
    {
        $this->setValidator(new EmailValidator("Formato inválido de correo", true));
        parent::__construct('email');
    }

}
