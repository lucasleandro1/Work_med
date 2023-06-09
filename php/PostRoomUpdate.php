<?php
require_once 'roomDAO.php';

$roomDAO = new RoomDAO();
$id = $_GET['id'];
$name = $_POST['name'];
$location = $_POST['location'];
$type_surgeries = $_POST['surgery'];
$description = $_POST['description'];

$room = new Room($name,$location,$type_surgeries,$description);
$room->setId($id);
$roomDAO->update($room);


header('Location: ../view/room-list.php');
?>
