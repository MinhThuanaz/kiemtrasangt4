<?php include 'app/views/shares/header.php'; ?>

<h1>Thêm Sinh Viên Mới</h1>

<form method="POST" action="/webdangkyhocphan/Student/save">
    <div class="form-group">
        <label for="name">Họ Tên:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="gender">Giới Tính:</label>
        <select id="gender" name="gender" class="form-control" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>

    <div class="form-group">
        <label for="dob">Ngày Sinh:</label>
        <input type="date" id="dob" name="dob" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="major_id">Ngành Học:</label>
        <select id="major_id" name="major_id" class="form-control" required>
            <?php foreach ($majors as $major): ?>
                <option value="<?php echo $major['MaNganh']; ?>">
                    <?php echo htmlspecialchars($major['TenNganh'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
</form>

<a href="/webdangkyhocphan/Student/" class="btn btn-secondary mt-2">Quay lại danh sách sinh viên</a>

<?php include 'app/views/shares/footer.php'; ?>
