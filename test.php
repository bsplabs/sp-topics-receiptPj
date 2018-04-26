<?php include "header.php" ?>


<section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h3>จัดการเอกสาร</h3>
          <div class="row">
            <form>
              <fieldset>
                <legend>กรอกข้อมูล</legend>
                <label>ชื่อโครงการ</label>
                <input type="text" id="nameProject">
                <label>จำนวนเงิน</label>
                <input type="text" id="amount">
                <label>ชื่อผู้เเจ้ง</label>
                <input type="text" id="nameOwn">
                <br><br>
                <button type="submit" class="btn">ตกลง</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- ######################  -->
  <script>
    function chk()
    {
      var nameProject = document.getElementById('nameProject').value;
      var nameProject = document.getElementById('nameProject').value;
      var nameProject = document.getElementById('nameProject').value;

    }
  </script>

<?php include "footer.php" ?>
