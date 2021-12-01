<?php

require_once __DIR__ . '/../entity/Usuario.php';

require_once __DIR__ . '/../database/QueryBuilder.php';

class UsuarioRepository extends QueryBuilder

{

    public function __construct(IPasswordGenerator $passwordGenerator){
        $this->passwordGenerator = $passwordGenerator;
        parent::__construct('users', 'Usuario');

    }
    
    public function findByUserNameAndPassword(string $username, string $password): ?Usuario{
        $sql = "SELECT * FROM $this->table WHERE username = :username";
        $parameters = ['username' => $username]; 

                  
               $statement = $this->connection->prepare($sql);
               $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
                $statement->execute($parameters);
               $result = $statement->fetch();
                if(empty($result)){
                    throw new NotFoundException("No se ha encontrado ningun usuario con esas credenciales");
                }else{
                    if(!$this->passwordGenerator::passwordVerify($password, $result->getPassword())){
                        throw new NotFoundException("No se ha encontrado ningun elemento con esas credenciales");
                    }
                }
               return $result;
            }
        
    

    public function save(Entity $entity){
            $parameters = $entity->toArray();
            $entity->setPassword($this->passwordGenerator::encrypt($parameters['password']));
            parent::save($entity);
    
}
}