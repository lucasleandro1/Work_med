<?php
require_once 'medicDAO.php';

$medicDAO = new MedicDAO();

$name = $_POST['nome'];
$speciality = $_POST['especialidade'];
$gen = $_POST['genero'];
$crm = $_POST['crm'];
$num = $_POST['celular'];
$cpf = $_POST['cpf'];
$date = $_POST['data_nascimento'];
$adr = $_POST['endereco'];

$doctor = new Doctor($name, $speciality, $gen, $crm, $num, $cpf, $date, $adr);
$medicDAO->create($doctor);

header('Location: ../view/select-list.php');

?>
