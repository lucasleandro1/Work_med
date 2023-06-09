<?php

 class Person{
   protected $id;
   protected $num;
   protected $name; 
   protected $cpf;
   protected $gen;
   protected $date;
   protected $adr;

   public function setId($id){
      $this->id = $id;
   }
   public function setNum($num){
      $this->num = $num;
   }
   public function setName($name){
    $this->name = $name;
   }
   public function setCpf($cpf){
    $this->cpf = $cpf;
   }
   public function setGen($gen){
    $this->gen = $gen;
   }
   public function setDate($date){
    $this->date = $date;
   }
   public function setAdr($adr){
    $this->adr = $adr;
   }

   public function getId(){
      return $this ->id;
   }
   public function getNum(){
      return $this->num;
   }
   public function getName(){
    return  $this->name;
   }
   public function getCpf(){
    return  $this->cpf;
   }
   public function getGen(){
    return  $this->gen;
   }
   public function getDate(){
    return  $this->date;
   }
   public function getAdr(){
    return  $this->adr;
   }
}








?>