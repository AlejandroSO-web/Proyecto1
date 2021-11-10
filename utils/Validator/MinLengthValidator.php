<?php
require_once "Validator.php";
class MinLengthValidator extends Validator {

    private $minLength;
    public function __construct(int $minLength, string $message, bool $last = false)
    {
        $this->minLength = $minLength;
        parent::__construct($message, $last);
    }
    public function doValidate(): bool{
        $ok  = (strlen($this->data) >= $this->minLength);
        if (!$ok) {
            $this->errors[] =  $this->message;
        }
        
        return $ok;
    } 
}