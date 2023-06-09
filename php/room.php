<?php

class Room {
    protected $id;
    protected $name;
    protected $location;
    protected $type_surgeries;
    protected $description;

    public function __construct($name, $location, $type_surgeries, $description) {
        $this->name = $name;
        $this->location = $location;
        $this->type_surgeries = $type_surgeries;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getTypeSurgeries() {
        return $this->type_surgeries;
    }

    public function setTypeSurgeries($type_surgeries) {
        $this->type_surgeries = $type_surgeries;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}


?>