<?php
require_once '../php/patientDAO.php';

if (isset($_GET['medico'])) {
    $medico = $_GET['medico'];

    $patientDAO = new PatientDAO();
    $numeroCirurgias = $patientDAO->getNumeroCirurgias($medico);

    echo json_encode(['count' => $numeroCirurgias]);
    exit();
}
