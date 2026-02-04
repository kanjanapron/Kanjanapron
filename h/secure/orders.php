<?php
    // รวมไฟล์เช็คสิทธิ์และเชื่อมต่อฐานข้อมูล
    include_once("../g/check_login.php"); 
    include_once("../g/c.php"); // ไฟล์เชื่อมต่อฐานข้อมูลที่คุณมีจริง
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fce4ec; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .table thead { background-color: #f8bbd0; color: #880e4f; }
        .btn-pink { background-color: #f06292; color: white; border: none; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .sidebar-link { color: #ad1457; text-decoration: none; font-weight: 600; }
        .sidebar-link:hover { color: #f06292; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../g/index2.php">Kanjanapron Admin</a>
        <div class="text-white">
            สวัสดีคุณ: <strong><?php echo $_SESSION['aname']; ?></strong>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card p-3">
                <h5 class="text-pink mb-3 px-2">เมนูจัดการ</h5>
                <div class="list-group list-group-flush">
                    <a href="../g/products.php" class="list-group-item list-group-item-action border-0 sidebar-link">📦 จัดการสินค้า</a>
                    <a href="../g/orders.php" class="list-group-item list-group-item-action border-0 sidebar-link active" style="background-color: #f8bbd0; border-radius: 10px;">📝 จัดการออเดอร์</a>
                    <a href="../g/costomers.php" class="list-group-item list-group-item-action border-0 sidebar-link">👥 จัดการลูกค้า</a>
                    <hr>
                    <a href="../g/logout.php" class="list-group-item list-group-item-action border-0 text-danger fw-bold">🚪 ออกจากระบบ</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-pink fw-bold m-0">รายการคำสั่งซื้อ</h2>
                    <button class="btn btn-pink btn-sm">+ เพิ่มออเดอร์ (Manual)</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>เลขที่ออเดอร์</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th>ราคารวม</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>สมชาย ใจดี</td>
                                <td>04/02/2026</td>
                                <td>1,500 ฿</td>
                                <td><span class="badge bg-warning text-dark">รอการชำระเงิน</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary">ดูรายละเอียด</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>สมหญิง รักสวย</td>
                                <td>03/02/2026</td>
                                <td>2,300 ฿</td>
                                <td><span class="badge bg-success">ชำระเงินแล้ว</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary">ดูรายละเอียด</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>