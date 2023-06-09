<?php
require_once '../php/patientDAO.php';

if (isset($_GET['insurance'])) {
    $insurance = $_GET['insurance'];

    $patientDAO = new PatientDAO();
    $numeroICirurgias = $patientDAO->getNumeroCirurgiasInsurance($insurance);

    echo json_encode(['count' => $numeroICirurgias]);
    exit();
}
