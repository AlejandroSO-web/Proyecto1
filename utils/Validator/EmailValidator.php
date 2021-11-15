<?php
require_once "Validator.php";
class EmailValidator extends Validator {

    public function doValidate(): bool{
        //FILTER_SANITIZE_EMAIL
        $result = filter_var($this->data, FILTER_VALIDATE_EMAIL);
        if (!$result) {
            $this->errors[] =  $this->message;
        }
        
        return $result;
    } 
}