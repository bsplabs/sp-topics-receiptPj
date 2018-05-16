<?php include "header.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
#example1 {
    border: 3px solid coral;
    padding: 10px;
    border-radius: 25px;
}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$name = $address = $road = $payor = $comment = $date = "";

?>

<h2><center>บันทึกข้อความ</center></h2>
<div id="example1">
<p><span class="error">กรุณากรอกข้อมูลให้ครบถ้วน</span></p>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    ส่วนราชการ: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
    ที่: <input type="text" name="address" value="<?php echo $address;?>"><br><br>
    <form>
      <div>
        <label for="date">วันที่-เดือน-ปี:</label>
        <input type="date" id="date" name="date" value="<?php echo $date;?>"><br><br>
      </div>
    </form>
    เรื่อง: <input type="text" name="road" value="<?php echo $road;?>"><br><br>
    เรียน: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
    ข้อความ: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br><br>
    ชื่อ: <input type="text" name="payor" value="<?php echo $payor;?>"><br><br>
    ตำแหน่ง: <input type="text" name="payor" value="<?php echo $payor;?>"><br><br>
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<br>
<div id="example1">
  <center>
    <?php
    echo "<h3>แบบฟอร์มบันทึกข้อความ</h3>";
    ?>
  <img src="./img/03.jpg" width="600" height="700">
</center>
</div>
<br>


</body>
</html>
<?php include "footer.php"; ?>
