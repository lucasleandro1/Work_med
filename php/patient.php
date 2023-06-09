<?php
require_once "person.php";
class Patient extends Person{
    protected $date_surgery;
    protected $medical_history;
    protected $expenses;
    protected $type_surgery;
    protected $doctor;
    protected $insurance;
    protected $room_used;

    public function __construct($name, $cpf, $gen, $date,$num, $adr, $date_surgery, $room_used, $insurance, $doctor, $expenses, $type_surgeries) {
        $this->num = $num;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->gen = $gen;
        $this->date = $date;
        $this->adr = $adr;
        $this->date_surgery = $date_surgery;
        $this->room_used = $room_used;
        $this->expenses = $expenses;
        $this->type_surgery = $type_surgeries;
        $this->doctor = $doctor;
        $this->insurance = $insurance;
    }
    
    public function setDateSurgery($dts){
        $this->date_surgery = $dts;
    }
    public function setRoomUsed($ru){
        $this->room_used= $ru;
    }
    public function setExpenses($exp){
        $this->expenses = $exp;
    }
    public function setTypeSurgery($mh){
        $this->type_surgery = $mh;
    }
    public function setDoctor($dct){
        $this->doctor = $dct;
    }
    public function setInsurance($ins){
        $this->insurance = $ins;
    }


    public function getDateSurgery(){
        return $this->date_surgery;
    }
    public function getRoomUsed(){
        return $this->room_used;
    }
    public function getExpenses(){
        return $this->expenses;
    }
    public function getTypeSurgery(){
        return $this->type_surgery;
    }
    public function getDoctor(){
        return $this->doctor;
    }
    public function getInsurance(){
        return $this->insurance;
    }
}



?>