<?php
require_once "person.php";
class Doctor extends Person{
    protected $speciality;
    protected $crm;

    public function __construct($name, $speciality, $gen, $crm, $num, $cpf, $date, $adr) {
        $this->num = $num;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->gen = $gen;
        $this->date = $date;
        $this->adr = $adr;
        $this->speciality = $speciality;
        $this->crm = $crm;
    }
    
    public function setSpeciality($spe){
        $this->speciality = $spe;
       }
    public function setCrm($crm){
        $this->crm = $crm;
       }
    public function getSpeciality(){
        return $this->speciality;
       }
    public function getCrm(){
        return $this->crm;
       }
}





?>