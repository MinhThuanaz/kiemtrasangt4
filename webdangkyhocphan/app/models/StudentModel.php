<?php
class StudentModel {
    private $conn;
    private $table_name = "sinhvien";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getStudents() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getStudentById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addStudent($name, $gender, $dob, $image, $major) {
        $query = "INSERT INTO " . $this->table_name . " (HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $gender, $dob, $image, $major);
        return $stmt->execute();
    }
}
?>
