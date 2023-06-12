<?php
require_once 'Conexao.php';
require_once 'superuser.php';   
class SuperuserDAO {

    public function create (Superuser $superuser) {
        $sql = 'INSERT INTO  superuser (user, password) VALUES (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $superuser->getUser());
        $stmt->bindValue(2, $superuser->getPass());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('superuser');
        $superuser->setId($id); 
    }
    
    public function login(Superuser $superuser) {
        $sql = 'SELECT * FROM superuser WHERE user = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $superuser->getUser());
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && $user['password'] === $superuser->getPass()) {
            // Autenticação bem-sucedida
            return true;
        } else {
            // Autenticação falhou
            return false;
        }
    }
    
        
    public function delete($id) {
        $sql = 'DELETE FROM surgery WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }


}

