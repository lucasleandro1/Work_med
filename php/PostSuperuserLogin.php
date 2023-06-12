<?php
require_once 'superuserDAO.php';

$superuserDAO = new SuperuserDAO();

$username = $_POST['user'];
$password = $_POST['pass'];
$superuser = new Superuser($username, $password);

if ($superuserDAO->login($superuser)) {
    echo "Login bem-sucedido!"; 
    header('Location: ../view/main.php');
} else {
    echo "Falha na autenticação!"; 
    header('Location: ../view/index.php');
}

?>

