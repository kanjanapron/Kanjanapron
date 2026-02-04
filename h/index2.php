<?php
	session_start();
	if(empty($_SESSION[aid])){
		echo"Access Denied" ;
		exit;
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> กาญจนาภรณ์ วินทะไชย (แตงกวา) </title>
</head>

<body>

<h1> หน้าหลักแอดมิน - กาญจนาภรณ์ </h1>

<?php echo "แอดมิน: ". $_SESSION['aname']; ?><br>

<ul>
	<a href="products.php"><li>จัดการสินค้า</li></a>
	<a href="orders.php"><li>จัดการออเดอร์</li></a>
    <a href="customers.php"><li>จัดการลูกค้า</li></a>
    <a href="logouts.php"><li>ออกจากระบบ</li></a>
</ul>


>
</body>
</html>