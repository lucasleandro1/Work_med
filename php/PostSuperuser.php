<?php
require_once 'superuserDAO.php';

$superuserDAO = new SuperuserDAO();

$user = $_POST['user'];
$pass = $_POST['pass'];

$superuser = new Superuser($user, $pass);
$superuserDAO->create($superuser);


header('Location: ../view/index.php');
?>
