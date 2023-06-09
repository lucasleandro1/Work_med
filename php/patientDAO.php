<?php
require_once 'Conexao.php';
require_once 'patient.php';   
class PatientDAO {

    public function create (Patient $patient) {
        $sql = 'INSERT INTO  patient (name, cpf, gender, date, number, adress, date_surgery, room_used, insurance, doctor_name, expenses, type_surgery) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $patient->getName());
        $stmt->bindValue(2, $patient->getCpf());
        $stmt->bindValue(3, $patient->getGen());
        $stmt->bindValue(4, $patient->getDate());
        $stmt->bindValue(5, $patient->getNum());
        $stmt->bindValue(6, $patient->getAdr());
        $stmt->bindValue(7, $patient->getDateSurgery());
        $stmt->bindValue(8, $patient->getRoomUsed());
        $stmt->bindValue(9, $patient->getInsurance());
        $stmt->bindValue(10, $patient->getDoctor());
        $stmt->bindValue(11, $patient->getExpenses());
        $stmt->bindValue(12, $patient->getTypeSurgery());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('patient');
        $patient->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM patient';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $patients = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $patient = new Patient($row['name'],$row['cpf'], $row['gender'], $row['date'], $row['number'], $row['adress'], $row['date_surgery'],$row['room_used'],$row['insurance'],$row['doctor_name'],$row['expenses'],$row['type_surgery']);
                $patient->setId($row['id']);
                $patients[] = $patient;
            }
        }return $patients;
    }

    public function SurgeryNames(){
        $sql = 'SELECT id, name FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[$row['name']] = $row['name'];
            }
        }
        return $names;
    }
    public function DoctorNames(){
        $sql = 'SELECT id, name FROM doctor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[$row['name']] = $row['name'];
            }
        }
        return $names;
    }

    public function RoomNames(){
        $sql = 'SELECT id, name FROM room';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[$row['name']] = $row['name'];
            }
        }
        return $names;
    }
    public function InsuranceNames(){
        $sql = 'SELECT id, insurance FROM patient';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[$row['insurance']] = $row['insurance'];
            }
        }
        return $names;
    }

    public function getPatientById($id)
    {
        $sql = 'SELECT * FROM patient WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $patient = new Patient(
                $result['name'],
                $result['cpf'],
                $result['gender'],
                $result['date'],
                $result['number'],
                $result['adress'],
                $result['date_surgery'],
                $result['room_used'],
                $result['insurance'],
                $result['doctor_name'],
                $result['expenses'],
                $result['type_surgery']
            );
    
            return $patient;
        }
    
    }
  
    

    public function update(Patient $patient){
        $sql = 'UPDATE patient SET name=?, cpf=?, gender=?, date=?, number=?, adress=?, date_surgery=?, room_used=?, insurance=?, doctor_name=?, expenses=?, type_surgery=? WHERE id=?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $patient->getName());
        $stmt->bindValue(2, $patient->getCpf());
        $stmt->bindValue(3, $patient->getGen());
        $stmt->bindValue(4, $patient->getDate());
        $stmt->bindValue(5, $patient->getNum());
        $stmt->bindValue(6, $patient->getAdr());
        $stmt->bindValue(7, $patient->getDateSurgery());
        $stmt->bindValue(8, $patient->getRoomUsed());
        $stmt->bindValue(9, $patient->getInsurance());
        $stmt->bindValue(10, $patient->getDoctor());
        $stmt->bindValue(11, $patient->getExpenses());
        $stmt->bindValue(12, $patient->getTypeSurgery());
        $stmt->bindValue(13, $patient->getId()); // Adicionar esta linha para vincular o ID do paciente
        $stmt->execute();
    }

    public function delete($id) {
        $sql = 'DELETE FROM patient WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }


    public function getNumeroCirurgias($medico) {
        $sql = "SELECT COUNT(*) as count FROM patient WHERE doctor_name = :medico";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':medico', $medico, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return $count;
    }
    public function getNumeroCirurgiasInsurance($insurance) {
        $sql = "SELECT COUNT(*) as count FROM patient WHERE insurance = :insurance";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':insurance', $insurance, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return $count;
    }
    

    public function getSurgeriesLastThreeMonths(){
        $sql = "SELECT DATE_FORMAT(date_surgery, '%Y-%m') as month, COUNT(*) as count
        FROM patient
        WHERE date_surgery >= DATE_FORMAT(NOW() - INTERVAL 2 MONTH, '%Y-%m-01')
        AND date_surgery <= LAST_DAY(NOW())
        GROUP BY DATE_FORMAT(date_surgery, '%Y-%m')
        ORDER BY DATE_FORMAT(date_surgery, '%Y-%m')";

        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSurgeriesProcedure() {
        $sql = "SELECT type_surgery, COUNT(*) AS count FROM patient GROUP BY type_surgery";
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getExpensesByMonth() {
        $sql = "SELECT DATE_FORMAT(date_surgery, '%Y-%m') as month, SUM(expenses) as expenses
                FROM patient
                GROUP BY DATE_FORMAT(date_surgery, '%Y-%m')
                ORDER BY DATE_FORMAT(date_surgery, '%Y-%m')";
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getExpensesTotal() {
        $sql = "SELECT SUM(expenses) as expenses FROM patient";
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        // Retorna somente o valor dos gastos totais
        return $result['expenses'];
    }

    public function getSurgeryTotal() {
        $sql = "SELECT COUNT(*) AS count FROM patient";
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result['count'];
    }
    public function getSurgerieToday() {
    $sql = "SELECT COUNT(*) AS count FROM patient WHERE DATE(date_surgery) = CURDATE()";
    
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    return $result['count'];
}
    
    
}