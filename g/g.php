<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ยอดขายรายเดือน - กาญจนาภรณ์ วินทะไชย (แตงกวา)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f6ff; padding: 20px; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        canvas { max-height: 350px !important; }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold text-primary">💰 ยอดขายรายเดือน (กาญจนาภรณ์ วินทะไชย)</h2>
    
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card h-100 p-4">
                <h5 class="text-center mb-3">สัดส่วนยอดขายรวมแต่ละเดือน</h5>
                <canvas id="monthlySalesPieChart"></canvas>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card h-100 p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>เดือน</th>
                                <th class="text-end">ยอดขาย (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once("connectdb.php");
                        $sql = "SELECT 
                                MONTH(p_date) AS MonthNum, 
                                MONTHNAME(p_date) AS MonthName, 
                                SUM(p_amount) AS Total_Sales
                            FROM popsupermarket
                            GROUP BY MONTH(p_date), MONTHNAME(p_date)
                            ORDER BY MonthNum;";
                        $rs = mysqli_query($conn, $sql);
                        
                        $months = [];
                        $sales = [];
                        
                        // Array สำหรับแปลงเลขเดือนเป็นชื่อเดือนภาษาไทย
                        $monthNamesTh = [
                            1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน',
                            5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม',
                            9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                        ];

                        while ($data = mysqli_fetch_array($rs)) {
                            $currentMonthName = $monthNamesTh[$data['MonthNum']]; // ใช้ชื่อเดือนภาษาไทย
                            
                            $months[] = $currentMonthName;
                            $sales[] = (float)$data['Total_Sales'];
                        ?>
                            <tr>
                                <td><strong><?php echo $currentMonthName; ?></strong></td>
                                <td class="text-end text-success fw-bold"><?php echo number_format($data['Total_Sales'], 2); ?></td>
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
    const monthLabels = <?php echo json_encode($months); ?>;
    const monthlySalesData = <?php echo json_encode($sales); ?>;

    const ctx = document.getElementById('monthlySalesPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie', // ประเภทกราฟ Pie Chart
        data: {
            labels: monthLabels,
            datasets: [{
                data: monthlySalesData,
                backgroundColor: [ // สีสำหรับแต่ละส่วนของพาย
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
                    '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360', '#ADD8E6'
                ],
                hoverOffset: 8
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' } // แสดง Legend ที่ด้านล่าง
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<?php mysqli_close($conn); ?>
</body>
</html>