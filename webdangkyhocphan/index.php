<?php
// Kết nối MySQL
$conn = new mysqli("localhost", "root", "", "test1"); // Đổi "my_database" thành tên DB của bạn
$conn->set_charset("utf8");

$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh Viên</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>TRANG SINH VIÊN</h2>
        <a href="add_student.php" class="add-student" onclick="redirectToAddStudent(event)">Add Student</a>
    <script>
        function redirectToAddStudent(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            window.location.href = "add_student.php"; // Chuyển hướng trang
        }
    </script>
        <table>
            <tr>
                <th>MaSV</th>
                <th>HoTen</th>
                <th>GioiTinh</th>
                <th>NgaySinh</th>
                <th>Hình</th>
                <th>MaNganh</th>
                <th>Hành động</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["MaSV"]; ?></td>
                <td><?php echo $row["HoTen"]; ?></td>
                <td><?php echo $row["GioiTinh"]; ?></td>
                <td><?php echo date("d/m/Y", strtotime($row["NgaySinh"])); ?></td>
                <td><img src="<?php echo $row["Hinh"]; ?>" alt="Ảnh sinh viên"></td>
                <td><?php echo $row["MaNganh"]; ?></td>
                <td class="action-links">
                    <a href="edit.php?id=<?php echo $row["MaSV"]; ?>" class="edit">Edit</a>
                    <a href="details.php?id=<?php echo $row["MaSV"]; ?>" class="details">Details</a>
                    <a href="delete.php?id=<?php echo $row["MaSV"]; ?>" class="delete" onclick="return confirm('Xóa sinh viên này?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
