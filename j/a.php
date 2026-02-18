<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>งาน j -- กาญจนาภรณ์ วินทะไชย (แตงกวา)</title>
</head>
<body>

<h1>งาน j -- กาญจนาภรณ์ วินทะไชย (แตงกวา)</h1>

<form method="post" enctype="multipart/form-data">
    รหัสนิสิต <input type="text" name="std_id" required>
    ชื่อ <input type="text" name="std_name" required>
    รูปภาพ <input type="file" name="std_img" accept="image/*" required>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
include_once("connectdb.php");

// ================== INSERT ==================
if(isset($_POST['Submit'])){

    $std_id = $_POST['std_id'];
    $std_name = $_POST['std_name'];

    $img_name = $_FILES['std_img']['name'];
    $tmp_name = $_FILES['std_img']['tmp_name'];

    // ถ้ามีรูป
    if($img_name != ""){
        move_uploaded_file($tmp_name, "img/".$img_name);
    }

    $sql = "INSERT INTO students (std_id, std_name, std_img) 
            VALUES ('$std_id', '$std_name', '$img_name')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('บันทึกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<table border="1">
<tr>
    <th>ลำดับ</th>
    <th>รหัสนิสิต</th>
    <th>ชื่อ</th>
    <th>รูปภาพ</th>
    <th>ลบ</th>
</tr>

<?php
$sql = "SELECT * FROM students ORDER BY s_id DESC";
$rs = mysqli_query($conn,$sql);

while ($data = mysqli_fetch_array($rs)){
?>
<tr>
    <td><?php echo $data['s_id']; ?></td>
    <td><?php echo $data['std_id']; ?></td>
    <td><?php echo $data['std_name']; ?></td>
    <td>
        <img src="img/<?php echo $data['std_img']; ?>" width="80">
    </td>
    <td align="center">
        <a href="delete_student.php?id=<?php echo $data['s_id']; ?>" 
           onclick="return confirm('ยืนยันการลบข้อมูลไหม?');">
            ❌
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>

<?php mysqli_close($conn); ?>
