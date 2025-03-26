<?php

require_once('app/config/database.php');
require_once('app/models/StudentModel.php');
require_once('app/models/MajorModel.php');

class StudentController {
    private $studentModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->studentModel = new StudentModel($this->db);
    }

    public function index() {
        $students = $this->studentModel->getStudents();
        include 'app/views/student/list.php';
    }

    public function add() {
        $majors = (new MajorModel($this->db))->getMajors();
        include 'app/views/student/add.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $dob = $_POST['dob'] ?? '';
            $major = $_POST['major_id'] ?? null;
            $image = "uploads/default.png"; // Có thể sửa thành upload ảnh thực tế

            $result = $this->studentModel->addStudent($name, $gender, $dob, $image, $major);

            if ($result) {
                header('Location: /webdangkyhocphan/Student');
            } else {
                echo "Có lỗi xảy ra khi thêm sinh viên.";
            }
        }
    }
}
?>
