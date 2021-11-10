<?php

interface IValidator
{
    public function getValidator();

    public function setValidator(Validator $validator);

    public function appendValidator(Validator $validator);

    public function validate();

    public function hasError(): bool;
    
    public function getErrors(): array;
}