<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - กาญจนาภรณ์ วินทะไชย (แตงกวา) - gemini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f6f9; padding: 20px; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        canvas { max-height: 350px !important; } /* ควบคุมขนาดกราฟไม่ให้ใหญ่เกินไป */
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold text-dark">กาญจนาภรณ์ วินทะไชย(แตงกวา) - gemini</h2>
    
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card h-100 p-4">
                <h5 class="text-center mb-3">สัดส่วนยอดขายรายประเทศ</h5>
                <canvas id="myPieChart"></canvas>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card h-100 p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ชื่อประเทศ</th>
                                <th class="text-end">ยอดขาย (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once("connectdb.php");
                        $sql = "SELECT `p_country`, SUM(`p_amount`) AS total_sales FROM `popsupermarket` GROUP BY `p_country` ORDER BY total_sales DESC";
                        $rs = mysqli_query($conn, $sql);
                        
                        $countries = [];
                        $sales = [];
                        
                        while ($data = mysqli_fetch_array($rs)) {
                            // เก็บข้อมูลใส่ Array เพื่อเอาไปใช้ใน JavaScript กราฟ
                            $countries[] = $data['p_country'];
                            $sales[] = (float)$data['total_sales'];
                        ?>
                            <tr>
                                <td><strong><?php echo $data['p_country']; ?></strong></td>
                                <td class="text-end"><?php echo number_format($data['total_sales'], 0); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ส่งค่าจาก PHP เข้าสู่ JavaScript
    const countryLabels = <?php echo json_encode($countries); ?>;
    const salesData = <?php echo json_encode($sales); ?>;

    const ctx = document.getElementById('myPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: countryLabels,
            datasets: [{
                data: salesData,
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                ],
                hoverOffset: 10
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<?php mysqli_close($conn); ?>
</body>
</html>