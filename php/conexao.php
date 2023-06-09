<?php

class Conexao {
    private static $instance;

    public static function getConn(){

        if (!isset(self::$instance)){
            self::$instance = new \PDO('mysql:host=localhost;dbname=workmed', 'root', '');
            
        }
        return self::$instance;
    }
}

// try {
//     $conn = Conexao::getConn();
//     echo "Conexão estabelecida com sucesso!";
//   } catch (PDOException $e) {
//     echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
//   }
  