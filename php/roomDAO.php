<?php
require_once 'Conexao.php';
require_once 'room.php';   
class RoomDAO {

    public function create (Room $room) {
        $sql = 'INSERT INTO  room (name, location,type_surgeries,description) VALUES (?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $room->getName());
        $stmt->bindValue(2, $room->getLocation());
        $stmt->bindValue(3, $room->getTypeSurgeries());
        $stmt->bindValue(4, $room->getDescription());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('room');
        $room->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM room';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $rooms = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $room = new Room($row['name'],$row['location'],$row['type_surgeries'],$row['description']);
                $room->setId($row['id']);
                $rooms[] = $room;
            }
        }else {
            // echo '<img src="../Components/SVG/nodata.svg" class="img-bnr" alt="Sem itens na lista">';
            echo '<p>Não há itens na lista.</p>';
        }
        return $rooms;
    }

    
    public function SurgeryNames(){
        $sql = 'SELECT name FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[] = $row['name'];
            }
        }
        return $names;
    }
    

    public function delete($id) {
        $sql = 'DELETE FROM room WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    public function getRoomById($id)
    {
        $sql = 'SELECT * FROM room WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            // Criar um objeto Patient com os dados obtidos do banco de dados
            $room = new Room(
                $result['name'],
                $result['location'],
                $result['type_surgeries'],
                $result['description'],
                
            );
    
            return $room;
        }
    
    }

    public function update(Room $room)
    {
        $sql = 'UPDATE room SET name=?, location=?, type_surgeries=?, description=? WHERE id=?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $room->getName());
        $stmt->bindValue(2, $room->getLocation());
        $stmt->bindValue(3, $room->getTypeSurgeries());
        $stmt->bindValue(4, $room->getDescription());
        $stmt->bindValue(5, $room->getId());
        $stmt->execute();
    }


}

