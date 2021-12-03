<?php
 
 class conexao{
      private $con;
       public function getcon(){
            try {
                $this->con = new PDO('mysql:host=localhost;dbname=cadastro','root','');
            } catch (PDOException $erro) {
                echo "erro ao conectar".$erro->getMessage();
            }

            
       }
       public function cadastrar( string $usuario, string $senha){

           $sql = $this->con->prepare('SELECT id FROM user WHERE usuario = :usuario');
           $sql->bindValue(":usuario" , $usuario);
           $sql->execute();
           if($sql->rowCount() > 0){
               return false;
           }
               $sql = $this->con->prepare('INSERT INTO user (usuario , senha)VALUES(:usuario, :senha)');
               $sql->bindValue(":usuario", $usuario);
               $sql->bindValue(":senha", $senha);
               $sql->execute();
               return true;

           
                
    }
    public function logar(string $usuario, string $senha){
        $sql = $this->con->prepare('SELECT id FROM user WHERE usuario = :usuario AND senha = :senha');
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        if($sql->rowCount() <=0){

           // echo "erro ao logar";
            return false;

        }
            $dado = $sql->fetch();

            session_start();

            $_SESSION['id'] = $dado['id'];
            return true;
           
            
        
    }
 }