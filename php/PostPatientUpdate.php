<?php
    require_once 'patientDAO.php';

    $patientDAO = new PatientDAO();
    $id = $_GET['id'];
    $name = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $gen = $_POST['genero'];
    $date = $_POST['data_nascimento'];
    $num = $_POST['celular'];
    $adr = $_POST['endereco'];
    $date_surgery = $_POST['data_cirurgia'];
    $room_used = $_POST['sala'];
    $insurance = $_POST['convenio'];
    $doctor = $_POST['medico'];
    $expenses = $_POST['gastos'];
    $type_surgeries = $_POST['surgery'];

    $patient = new Patient($name, $cpf, $gen, $date, $num, $adr, $date_surgery, $room_used, $insurance, $doctor, $expenses, $type_surgeries);
    $patient->setId($id); // Definir o ID do paciente
    $patientDAO->update($patient);

    header('Location: ../view/patient-list.php');
?>