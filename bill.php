<?php include "header.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$name = $address = $road = $comment = $website = $date = "";

?>

<h2>ใบสำคัญรับงิน</h2>
<p><span class="error">กรุณากรอกข้อมูลให้ครบถ้วน</span></p>
<form>
  <div>
    <label for="date">วันที่-เดือน-ปี:</label>
    <input type="date" id="date" name="date" value="<?php echo $date;?>">
  </div>
</form>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  ชื่อ: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
  บ้านเลขที่: <input type="text" name="address" value="<?php echo $address;?>"><br><br>
  ถนน: <input type="text" name="road" value="<?php echo $road;?>"><br><br>

  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $date;
echo "<br>";
echo $name;
echo "<br>";
echo $comment;
echo "<br>";
?>

</body>
</html>
<?php include "footer.php"; ?>
