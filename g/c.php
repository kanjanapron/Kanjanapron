<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>กาญจนาภรณ์ วินทะไชย (แตงกวา)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap');
        body { 
            font-family: 'Sarabun', sans-serif; 
            background-color: #f4f7f6; 
            padding-top: 50px;
        }
        .main-card { 
            background: #ffffff; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            padding: 30px; 
            margin-bottom: 50px;
        }
        .table thead { background-color: #212529; color: white; }
        .img-product { border-radius: 8px; border: 1px solid #ddd; object-fit: cover; }
    </style>
</head>
<body>

<div class="container">
    <div class="main-card">
        <h2 class="text-center mb-4 fw-bold text-primary">รายชื่อสินค้า - กาญจนาภรณ์ วินทะไชย</h2>
        <hr>
        
        <div class="table-responsive">
            <table id="productTable" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                <?php	
                include_once("connectdb.php");
                $sql = "SELECT * FROM `popsupermarket` ";
                $rs = mysqli_query($conn, $sql);
                
                // ตรวจสอบข้อมูลว่ามี Error หรือไม่
                if (!$rs) {
                    die("Query Error: " . mysqli_error($conn));
                }

                while ($data = mysqli_fetch_array($rs)) {
                ?>
                    <tr>
                        <td><?php echo $data['p_order_id'];?></td>
                        <td class="fw-bold"><?php echo $data['p_product_name'];?></td>
                        <td><span class="badge rounded-pill bg-secondary"><?php echo $data['p_category'];?></span></td>
                        <td><?php echo $data['p_date'];?></td>
                        <td><?php echo $data['p_country'];?></td>
                        <td class="text-end text-success fw-bold">
                            <?php echo number_format($data['p_amount'], 2);?>
                        </td>
                        <td class="text-center">
                            <img src="img/<?php echo $data['p_product_name'];?>.jpg" width="50" height="50" class="img-product" onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                        </td>
                    </tr>
                <?php 
                } // ปิดปีกกาของ while ที่ตรงนี้ (บรรทัดที่เคย Error)
                
                mysqli_close($conn); 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "pageLength": 10,
            "order": [[0, "desc"]]
        });
    });
</script>

</body>
</html>