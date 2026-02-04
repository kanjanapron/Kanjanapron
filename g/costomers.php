<?php
    include_once("check_login.php"); 
    include_once("c.php"); // ไฟล์เชื่อมต่อฐานข้อมูลของคุณ
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - กาญจนาภรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .text-pink { color: #d81b60; }
        .table thead { background-color: #fce4ec; color: #ad1457; }
        .btn-pink { background-color: #f06292; color: white; }
        .btn-pink:hover { background-color: #d81b60; color: white; }
        .nav-link-custom { color: #ad1457; font-weight: 600; text-decoration: none; }
        .nav-link-custom:hover { color: #f06292; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php"><i class="bi bi-person-badge-fill me-2"></i>Admin Panel</a>
        <div class="text-white small">
            <i class="bi bi-person-circle"></i> แอดมิน: <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index2.php" class="text-pink">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">จัดการลูกค้า</li>
                </ol>
            </nav>
            <h2 class="text-pink fw-bold">บัญชีรายชื่อลูกค้า</h2>
        </div>
        <div class="col-md-4 text-md-end d-flex align-items-end justify-content-md-end">
            <button class="btn btn-pink rounded-pill"><i class="bi bi-person-plus-fill me-1"></i> เพิ่มลูกค้าใหม่</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card p-3">
                <div class="list-group list-group-flush">
                    <a href="products.php" class="list-group-item list-group-item-action border-0 nav-link-custom"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                    <a href="orders.php" class="list-group-item list-group-item-action border-0 nav-link-custom"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a>
                    <a href="costomers.php" class="list-group-item list-group-item-action border-0 nav-link-custom active" style="background-color: #fce4ec; border-radius: 10px; color: #d81b60;"><i class="bi bi-people-fill me-2"></i> จัดการลูกค้า</a>
                    <hr>
                    <a href="logout.php" class="list-group-item list-group-item-action border-0 text-danger fw-bold" onclick="return confirm('ยืนยันออกจากระบบ?')"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="30%">ชื่อ-นามสกุล</th>
                                <th width="30%">อีเมล / เบอร์โทร</th>
                                <th width="15%">วันที่สมัคร</th>
                                <th width="15%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ตัวอย่างการ Query แบบพื้นฐาน (ควรใช้ LIMIT สำหรับ Pagination ในอนาคต)
                            $sql = "SELECT * FROM customers ORDER BY c_id DESC";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><strong>#<?php echo $row['c_id']; ?></strong></td>
                                <td><?php echo htmlspecialchars($row['c_fullname']); ?></td>
                                <td>
                                    <div class="small text-muted"><?php echo htmlspecialchars($row['c_email']); ?></div>
                                    <div class="small"><?php echo htmlspecialchars($row['c_tel']); ?></div>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($row['c_created_at'])); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="edit_customer.php?id=<?php echo $row['c_id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="del_customer.php?id=<?php echo $row['c_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ลบข้อมูลลูกค้าท่านนี้หรือไม่?')"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='5' class='text-center py-4'>ไม่พบข้อมูลลูกค้า</td></tr>";
                            }
                            ?>
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