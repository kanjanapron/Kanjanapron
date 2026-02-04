<?php
session_start();
// ย้ายมาไว้ตรงนี้เพื่อให้ $conn ไม่เป็น null
include_once("c.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* ชมพูอ่อน */
            font-family: 'Sarabun', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
        .form-control:focus {
            border-color: #f06292;
            box-shadow: 0 0 0 0.25rem rgba(240, 98, 146, 0.25);
        }
        .text-pink { color: #d81b60; }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 text-pink fw-bold">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-center text-muted mb-4 small">กาญจนาภรณ์ วินทะไชย</p>
                    
                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="auser" class="form-control" placeholder="ชื่อผู้ใช้งาน" autofocus required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="apwd" class="form-control" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="Submit" class="btn btn-pink py-2 fw-bold">LOGIN</button>
                        </div>
                    </form>

                    <?php
                    if(isset($_POST['Submit'])) {
                        $user = $_POST['auser'];
                        $pwd = $_POST['apwd'];

                        if ($conn) {
                            // ใช้ Prepared Statement ป้องกัน SQL Injection
                            $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
                            mysqli_stmt_bind_param($stmt, "s", $user);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            
                            if($data = mysqli_fetch_array($result)){
                                // ตรวจสอบรหัสผ่าน (รองรับทั้งแบบธรรมดาและแบบ Hash เพื่อความสะดวกในการทดสอบช่วงแรก)
                                if(password_verify($pwd, $data['a_password']) || $pwd === $data['a_password']) {
                                    $_SESSION['aid'] = $data['a_id'];
                                    $_SESSION['aname'] = $data['a_name'];
                                    echo "<script>window.location='index2.php';</script>";
                                } else {
                                    echo "<div class='alert alert-danger mt-3 text-center small'>รหัสผ่านไม่ถูกต้อง</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger mt-3 text-center small'>ไม่พบชื่อผู้ใช้งานนี้</div>";
                            }
                        } else {
                            echo "<div class='alert alert-warning mt-3 text-center small'>เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>