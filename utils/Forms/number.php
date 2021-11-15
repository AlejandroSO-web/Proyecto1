<?php
require_once "./FormElement.php";
require_once "./NumberElement.php";
require_once "./ButtonElement.php";
require_once "./LabelElement.php";
require_once "./../Validator/RangeValidator.php";

$b = new ButtonElement('Send');

$numero = new NumberElement();
$numero
  ->setName('numero')
  ->setId('numero')
  ->appendValidator(new RangeValidator(1, 100, 'El valor debe estar comprendido entre 1 y 100', true));


$labelNumero = new LabelElement("Número", $numero);

$form = new FormElement();
$form
  ->appendChild($labelNumero)
  ->appendChild($numero)
  ->appendChild($b);

  if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    $form->validate();
 
    if ($form->hasError()){
      print_r($form->getErrors());
    }
  }

  echo $form->render();