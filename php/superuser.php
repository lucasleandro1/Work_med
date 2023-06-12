<?php

class Superuser{
    protected $id;
    private $user;
    private $pass;

    public function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function getUser() {
        return $this->user;
    }
    
    public function setPass($pass) {
        $this->pass = $pass;
    }
    
    public function getPass() {
        return $this->pass;
    }

}





?>