<?php
require_once "./FormElement.php";
require_once "./PasswordElement.php";
require_once "./ButtonElement.php";
require_once "./LabelElement.php";
require_once "./EmailElement.php";
require_once "./../Validator/NotEmptyValidator.php";
require_once "./../Validator/PasswordMatchValidator.php";
require_once "./../Validator/MinLengthValidator.php";
require_once "./../Validator/MinLowerCaseValidator.php";
require_once "./../Validator/MinDigitValidator.php";


$b = new ButtonElement('Send');

$email = new EmailElement();
$email
  ->setName('email')
  ->setId('email');

$labelEmail = new LabelElement("Correo electrónico", $email);

$pv = new NotEmptyValidator('La contraseña no puede estar vacía', true);
$mlv = new MinLengthValidator(6, 'La contraseña debe tener al menos 6 caracteres', false);
$mlcv =  new MinLowerCaseValidator(2, 'La contraseña debe tener al menos 2 letras minúsculas', false);
$mdv =  new MinDigitValidator(2, 'La contraseña debe tener al menos 2 dígitos', false);

$mlcv->setNextValidator($mdv);
$mlv->setNextValidator($mlcv);
$pv->setNextValidator($mlv);

$pass = new PasswordElement();
$pass
  ->setName("password")
  ->setId("password")
  ->setValidator($pv);

$repite = new PasswordElement();
$repite
  ->setName("repite_password")
  ->setId("repite_password")
  ->setValidator(new PasswordMatchValidator($pass, 'Las contraseñas no coinciden', true));

$labelPass = new LabelElement("Contraseña", $pass);
$labelRepitePass = new LabelElement("Repita la contraseña", $pass);


$form = new FormElement();
$form
  ->appendChild($labelEmail)
  ->appendChild($email)
  ->appendChild($labelPass)
  ->appendChild($pass)
  ->appendChild($labelRepitePass)
  ->appendChild($repite)
  ->appendChild($b);

  if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    $form->validate();
 
    if ($form->hasError()){
      print_r($form->getErrors());
    }
  }

  echo $form->render();