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
                <input type="text" id="nameProject" value="โครงการ A">
                <label>จำนวนเงิน</label>
                <input type="text" id="amount" value="1,000,000">
                <label>ชื่อผู้เเจ้ง</label>
                <input type="text" id="nameOwn" value="นายชัชวาล สารชัย">
                <br><br>
                <button type="submit" class="btn" id="btn">ตกลง</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <h3></h3>
          <div class="row">
            <p id="msg"></p>
          </div>
        </div>
      </div>

    </div>
  </section>
<!-- ######################  -->



<script>
  $("button").click(function(){
      var nameProject = document.getElementById('nameProject').value;
      var amount = document.getElementById('amount').value;
      var nameOwn = document.getElementById('nameOwn').value;
      var data = 'name='+nameProject;
      var dataString = {
        "nameProject": nameProject,
        "amount": amount,
        "nameOwn": nameOwn
      };
      $.ajax({
        type:"POST",
        url:"showdata.php",
        data: dataString,
        cache: false,
        success: function(html){
          alert(html);
          $('#msg').html(html);
        }
      });
  });
</script>

<?php include "footer.php" ?>
