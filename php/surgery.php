<?php

class Surgery {
    protected $id;
    protected $name;
    protected $description;
    
    public function __construct( $name, $description) {
        $this->name = $name;
        $this->description = $description;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }
}
?>