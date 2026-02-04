<?php
session_start();


// ตรวจสอบสิทธิ์การเข้าใช้งาน
if (empty($_SESSION['aid'])) {
    echo "<div style='text-align:center; margin-top:50px;'>";
    echo "<h3>Access Denied! กำลังกลับไปหน้า Login...</h3>";
    echo "</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php'>";
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Sarabun', sans-serif; 
            background-color: #fce4ec; /* ชมพูอ่อนมาก */
        }
        .navbar { background-color: #f06292 !important; } /* ชมพูเข้ม */
        .card-menu {
            transition: transform 0.3s;
            border: none;
            border-radius: 15px;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(240, 98, 146, 0.2);
        }
        .btn-logout { background-color: #d81b60; color: white; }
        .text-pink { color: #ad1457; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
        <div class="d-flex align-items-center text-white">
            <span class="me-3">ยินดีต้อนรับ: <strong><?php echo $_SESSION['aname']; ?></strong></span>
            <a href="logout.php" class="btn btn-sm btn-outline-light">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="text-pink fw-bold">ระบบจัดการหลังบ้าน</h1>
        <p class="text-muted">เลือกเมนูที่ต้องการจัดการข้อมูล</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card card-menu h-100 p-4 text-center">
                    <div class="card-body">
                        <h2 class="display-4 mb-3">📦</h2>
                        <h4 class="card-title text-pink">จัดการสินค้า</h4>
                        <p class="card-text text-muted">เพิ่ม ลบ แก้ไข ข้อมูลสินค้าในระบบ</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card card-menu h-100 p-4 text-center">
                    <div class="card-body">
                        <h2 class="display-4 mb-3">📝</h2>
                        <h4 class="card-title text-pink">จัดการคำสั่งซื้อ</h4>
                        <p class="card-text text-muted">ตรวจสอบและอัปเดตสถานะออเดอร์</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="costomers.php" class="text-decoration-none">
                <div class="card card-menu h-100 p-4 text-center">
                    <div class="card-body">
                        <h2 class="display-4 mb-3">👥</h2>
                        <h4 class="card-title text-pink">จัดการลูกค้า</h4>
                        <p class="card-text text-muted">ดูข้อมูลสมาชิกและประวัติการซื้อ</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <footer class="mt-5 text-center text-muted">
        <p>© 2026 กาญจนาภรณ์ วินทะไชย - All Rights Reserved</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>