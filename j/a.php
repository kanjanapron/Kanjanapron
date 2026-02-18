<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>งาน j -- กาญจนาภรณ์ วินทะไชย (แตงกวา)</title>
</head>
<body>
<h1>งาน j -- กาญจนาภรณ์ วินทะไชย (แตงกวา)</h1>

<form method="post" action="" enctype="multipart/form-data">
    รหัสนิสิต <input type="text" name="std_id" required>
    ชื่อ <input type="text" name="std_name" required>
    รูปภาพ <input type="file" name="std_img" accept="image/*" required>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
include_once("connectdb.php");

if(isset($_POST['Submit'])){
    $std_id = $_POST['std_id'];
    $std_name = $_POST['std_name'];

    // จัดการอัปโหลดรูป
    $img_name = $_FILES['std_img']['name'];
    $tmp_name = $_FILES['std_img']['tmp_name'];
    $folder = "img/".$img_name;

    move_uploaded_file($tmp_name, $folder);

    $sql = "INSERT INTO students (s_id, std_id, std_name, std_img) 
            VALUES (NULL, '$std_id', '$std_name', '$img_name')";
    mysqli_query($conn, $sql);
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
$sql = "SELECT * FROM students";
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
    <td width="80" align="center">
        <a href="delete_student.php?id=<?php echo $data['s_id']; ?>"
           onclick="return confirm('ยืนยันการลบข้อมูลไหม?');">
            <img src="img/1.png" width="20">
        </a>
    </td>
</tr>
<?php } ?>

</table>
</body>
</html>

<?php
mysqli_close($conn);
?>
