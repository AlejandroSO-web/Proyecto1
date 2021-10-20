<?php
    $title = "Contact";
    require_once "./utils/utils.php";
    include("./views/contact.view.php");

$info = $firstName = $lastName = $email = $subject = $message = "";
$firstNameError = $emailErr = $subjectError = $hayErrores = false;
$errores = [];

if("POST" === $_SERVER["REQUEST_METHOD"]){

    $firstName = sanitizeInput(($_POST["firstName"] ?? ""));
    $lastName = sanitizeInput(($_POST["lastName"] ?? ""));
    $email = sanitizeInput(($_POST["email"] ?? ""));
    $subject = sanitizeInput(($_POST["subject"] ?? ""));
    $message = sanitizeInput(($_POST["message"] ?? ""));

    if (empty($firstName)){
        $errores[]  = "Nombre es obligatorio";
        $firstNameError = true;
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores[]  = "Formato invalido de correo";
        $emailErr = false;
    }
    if (empty($subject)){
        $errores[]  = "El asunto es obligatorio";
        $subjectError = true;
    }
    if (sizeof($errores) > 0){
        $hayErrores = true;
    }
    if (empty($firstName)){
        $errores[]  = "Nombre es obligatorio";
        $firstNameError = true;
    }
}