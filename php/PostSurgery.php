<?php
require_once 'surgeryDAO.php';

$surgeryDAO = new SurgeryDAO();

$name = $_POST['nome'];
$description = $_POST['descricao'];

$surgery = new Surgery($name, $description);
$surgeryDAO->create($surgery);


header('Location: ../view/select-list.php');
?>
