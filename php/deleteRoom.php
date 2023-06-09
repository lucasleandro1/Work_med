<?php
require_once('roomDao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $roomDAO = new RoomDAO();
    $roomDAO->delete($id);
    header('Location: ../view/room-list.php');
    exit();
}

?>