<?php
require_once 'surgeryDAO.php';

$surgeryDAO = new SurgeryDAO();
$id = $_GET['id'];
$name = $_POST['nome'];
$description = $_POST['descricao'];

$surgery = new Surgery($name, $description);
$surgery->setId($id);
$surgeryDAO->update($surgery);



header('Location: ../view/surgery-list.php');
?>
