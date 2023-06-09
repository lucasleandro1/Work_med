<?php
require_once('patientDao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $patientDAO = new PatientDAO();
    $patientDAO->delete($id);
    header('Location: ../view/patient-list.php');
    exit();
}
?>