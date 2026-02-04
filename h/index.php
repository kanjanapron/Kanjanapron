<?php
session_start();
// ตั้งค่าเพื่อแสดง Error กรณีที่มีปัญหา (เอาออกเมื่อใช้งานจริง)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['Submit'])) {
    include_once("c.php"); // เปลี่ยนกลับเป็น connectdb.php ตามที่ใช้งานจริง

    $user = $_POST['auser'];
    $pass = $_POST['apwd'];

    // ป้องกัน SQL Injection ด้วย Prepared Statements
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        
        // ตรวจสอบรหัสผ่านที่เข้ารหัส (Hash)
        if (password_verify($pass, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>window.location='index2.php';</script>";
            exit;
        }
    }
    
    $error_msg = "Username หรือ Password ไม่ถูกต้อง";
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fce4ec; } /* ชมพูอ่อน */
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-pink { background-color: #f06292; color: white; border: none; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .text-pink { color: #d81b60; }
    </style>
</head>
<body class="d-flex align-items-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 text-pink fw-bold">Login หลังบ้าน</h3>
                    
                    <?php if(isset($error_msg)): ?>
                        <div class="alert alert-danger py-2"><?php echo $error_msg; ?></div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="auser" class="form-control" placeholder="ชื่อผู้ใช้" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="apwd" class="form-control" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="Submit" class="btn btn-pink btn-lg">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-3 text-muted">© กาญจนาภรณ์ วินทะไชย</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>