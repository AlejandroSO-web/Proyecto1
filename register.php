<?php
  $title = "Register";
  require_once "./utils/utils.php";
  require_once "./utils/Forms/InputElement.php";
  require_once "./utils/Forms/TextareaElement.php";
  require_once "./utils/Forms/ButtonElement.php";
  require_once "./utils/Forms/FileElement.php";
  require_once "./utils/Forms/FormElement.php";
  require_once "./utils/Forms/EmailElement.php";
  require_once "./utils/Forms/PasswordElement.php";
  require_once "./utils/Validator/PasswordMatchValidator.php";
  require_once "./utils/Forms/custom/MyFormGroup.php";
  require_once "./utils/Forms/custom/MyFormControl.php";
  require_once "./utils/Validator/NotEmptyValidator.php";
  require_once "./utils/Validator/MimetypeValidator.php";
  require_once "./utils/Validator/MaxSizeValidator.php";    
  require_once "./exceptions/FileException.php";
  require_once "./utils/SimpleImage.php";
  require_once "./entity/Usuario.php";
  require_once "./repository/UsuarioRepository.php";
  require_once "./security/PlainPasswordGenerator.php";
  require_once "./security/BCryptPasswordGenerator.php";
  $config = require_once 'app/config.php';
  App::bind('config',$config);
  App::bind('connection', Connection::make($config['database']));
  $repositorio  = new UsuarioRepository(new BCryptPasswordGenerator());
  $info = $urlImagen = "";
  session_start();

    $info = "";

    $nombreUsuario = new InputElement('text');

    $nombreUsuario

      ->setName('username')

      ->setId('username');

    $nombreUsuario->setValidator(new NotEmptyValidator('El nombre de usuari@ no puede estar vacío', true));

    $userWrapper = new MyFormControl($nombreUsuario, 'Nombre de usuari@', 'col-xs-12');

    $email = new EmailElement();

    $email

      ->setName('email')

      ->setId('email');

    $emailWrapper = new MyFormControl($email, 'Correo electrónico', 'col-xs-12');

    $pv = new NotEmptyValidator('La contraseña no puede estar vacía', true);

    $pass = new PasswordElement();

    $pass

    ->setName('password')

    ->setId('password');

    

    $pass->setValidator($pv);

    $passWrapper = new MyFormControl($pass, 'Contraseña', 'col-xs-12');

    $repite = new PasswordElement();

    $repite

    ->setName('repite_password')

    ->setId('repite_password');

    $repite->setValidator(new PasswordMatchValidator($pass, 'Las contraseñas no coinciden', true));

    $repiteWrapper = new MyFormControl($repite, 'Repita la contraseña', 'col-xs-12');

    $b = new ButtonElement('Registro', '', '', 'pull-right btn btn-lg sr-button');

    $form = new FormElement();

    $form

      ->appendChild($userWrapper)

      ->appendChild($emailWrapper)

      ->appendChild($passWrapper)

      ->appendChild($repiteWrapper)

      ->appendChild($b);

    if("POST" === $_SERVER["REQUEST_METHOD"]){
        $form->validate();
        if(!$form->hasError()){
            try{
                $usuario = new Usuario($nombreUsuario->getValue(),$email->getValue(), $pass->getValue());
                $repositorio->save($usuario);
                $_SESSION['username'] = $nombreUsuario->getValue();
                header('location: /');
            }catch(QueryException $qe){
                $excepcion = $qe->getMessage();
                if ((strpos($excepcion, '1062') !== false)){
                if ((strpos($excepcion, 'username') !== false)){
                  $form->addError('Ya existe un usuario registrado con dicho nombre de usuario');
                }else if ((strpos($excepcion, 'email') !== false)){
                  $form->addError('Ya existe un usuario registrado con dicho correo electronico');
                }else {
                  $form->addError($qe->getMessage());
                }
              }else{
                $form->addError($qe->getMessage());
              }
            }catch(Exception $err){
                $form->addError($err->getMessage());
            }
        }
    }
    include("./views/register.view.php");