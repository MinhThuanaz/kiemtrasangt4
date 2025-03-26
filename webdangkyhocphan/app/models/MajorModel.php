<?php
class MajorModel {
    private $conn;
    private $table_name = "nganhhoc"; // Đổi tên theo DB của bạn

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getMajors() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getMajorById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaNganh = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addMajor($name) {
        $query = "INSERT INTO " . $this->table_name . " (TenNganh) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public function deleteMajor($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaNganh = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
