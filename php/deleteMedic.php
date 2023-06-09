<?php
require_once('medicDao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $MedicDAO = new MedicDAO();
    $MedicDAO->delete($id);
    header('Location: ../view/medic-list.php');
    exit();
}
?>