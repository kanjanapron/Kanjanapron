<?php
    include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการระบบ - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-menu {
            border: none; border-radius: 20px;
            transition: all 0.3s ease;
            text-decoration: none; color: #444;
            background: white;
        }
        .card-menu:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(240, 98, 146, 0.15);
            color: #d81b60;
        }
        .icon-box {
            width: 70px; height: 70px;
            background-color: #fce4ec; color: #f06292;
            border-radius: 50%; display: flex;
            align-items: center; justify-content: center;
            font-size: 30px; margin: 0 auto 20px;
        }
        .text-pink-bold { color: #d81b60; font-weight: 700; }
        .logout-btn { border: 1px solid rgba(255,255,255,0.6); border-radius: 50px; transition: 0.3s; }
        .logout-btn:hover { background: white; color: #f06292 !important; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shield-lock-fill me-2"></i>Admin Panel</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3 d-none d-sm-inline">
                สวัสดี, <strong><?php echo html_escape($_SESSION['aname']); ?></strong>
            </span>
            <a href="logout.php" class="btn btn-sm logout-btn text-white" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')">
                <i class="bi bi-box-arrow-right me-1"></i> ออกจากระบบ
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h2 class="text-pink-bold">ระบบจัดการร้านค้าออนไลน์</h2>
        <p class="text-muted small text-uppercase fw-bold" style="letter-spacing: 2px;">Kanjanapron Backend Management</p>
        <div class="mx-auto" style="width: 60px; height: 4px; background: #f06292; border-radius: 2px;"></div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-lg-3">
            <a href="products.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box"><i class="bi bi-box-seam-fill"></i></div>
                <h5 class="fw-bold">จัดการสินค้า</h5>
                <span class="small text-muted">สต็อกและรายละเอียด</span>
            </a>
        </div>

        <div class="col-6 col-lg-3">
            <a href="orders.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box"><i class="bi bi-cart-check-fill"></i></div>
                <h5 class="fw-bold">จัดการออเดอร์</h5>
                <span class="small text-muted">รายการสั่งซื้อลูกค้า</span>
            </a>
        </div>

        <div class="col-6 col-lg-3">
            <a href="costomers.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box"><i class="bi bi-people-fill"></i></div>
                <h5 class="fw-bold">จัดการลูกค้า</h5>
                <span class="small text-muted">ข้อมูลสมาชิก</span>
            </a>
        </div>
    </div>

    <footer class="text-center mt-5 pt-5 text-muted small">
        <p>© 2026 Kanjanapron Wintachai. Built with <i class="bi bi-heart-fill text-danger"></i> & Bootstrap 5.3</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>