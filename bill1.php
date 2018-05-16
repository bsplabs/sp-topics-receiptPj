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

#example2 {
    border: 2px solid red;
    padding: 10px;
    border-radius: 50px 20px;
}

</style>
</head>

<?php
// define variables and set to empty values
$name = $address = $road = $payor = $comment = $date = $tel = "";

?>

<h2><center>หนังสือราชการ<h4><span style="color:gray">(หนังสือภายนอก)</span></h4></center></h2>
<div id="example1">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    ที่: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
    <form>
      <div>
        <label for="date">วันที่-เดือน-ปี:</label>
        <input type="date" id="date" name="date" value="<?php echo $date;?>"><br><br>
      </div>
    </form>
    ส่วนราชการเจ้าของหนังสือ: <input type="text" name="name" value="<?php echo $name;?>"><br><br>
    เรื่อง: <input type="text" name="address" value="<?php echo $address;?>"><br><br>
    ข้อความ: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br><br>
    คำลงท้าย: <input type="text" name="road" value="<?php echo $road;?>"><br><br>
    ชื่อ: <input type="text" name="road" value="<?php echo $road;?>"><br><br>
    ส่วนราชการเจ้าของเรื่อง: <input type="text" name="road" value="<?php echo $road;?>"><br><br>
    เบอร์โทร: <input type="text" name="tel" value="<?php echo $tel;?>"><br><br>
      <input type="submit" name="submit" value="Submit">
  </form>
</div>
<br>
<div id="example1">
  <center>
    <?php
    echo "<h3>แบบฟอร์มหนังสือภายนอก</h3>";
    ?>
  <img src="./img/02.jpg" width="750" height="700">
</center>
</div>
<br>
</body>
</html>


<?php include "footer.php"; ?>
