<?php
namespace App\Managers;
class Upload extends Manager
{
  public function index($req, $res)
  {
    return $this->view->render($res, 'upload.phtml');
  }

  public function getUploadFile($req, $res) {
    return $this->view->render($res, 'upload.phtml');
  }

  public function postUploadFile($req, $res) {
    echo "Uploading...<br/>";

    if(is_uploaded_file($_FILES['upload_file']['tmp_name']))
    {
    	$e = $_FILES['upload_file']['error'];

    	//ถ้าเป็นเลขที่ไม่ใช่ 0 แสดงว่าเกิดข้อผิดพลาด
    	if($e != 0)
      {
    		$msg = "";
    		if($e == 1)
        {
    			$msg['error'] = "ไฟล์ที่อัปโหลดมีขนาดเกินกว่าขนาด upload_max_filesize (".ini_get("upload_max_filesize").")";
    		}
    		else if($e == 2)
        {
    			$max = round($_POST['MAX_FILE_SIZE'] /1000);  //โดยประมาณเท่านั้น ความจริงต้องหารด้วย 1024
    			$msg['error'] = "ไฟล์ที่อัปโหลดมีขนาดเกินกว่าค่า  MAX_FILE_SIZE (".$max." KB)";
    		}
    		else if($e == 3)
        {
    			$msg['error'] = "ไฟล์ถูกอัปโหลดมาไม่ครบ";
    		}
    		else if($e == 4)
        {
    			$msg['error'] = "ไม่มีไฟล์อัปโหลดมา";
    		}
    		else
        {
    			$msg['error'] = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
    		}

    		return $this->view->render($res, 'upload.phtml', $msg);
    	}
    	else
      {
    		@mkdir("images"); //ถ้ายังไม่มีไดเร็กทอรี ให้สร้างขึ้นใหม่

    		$target = "images/".$_FILES['upload_file']['name'];
    		if(!file_exists($target))
        {
    			move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);
    		}
     		else
        {
  				$oldname = pathinfo($_FILES['upload_file']['name'], PATHINFO_FILENAME);
  				$ext =  pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION);
  				do {
  					$r = rand();
  					$newname = $oldname."_".$r.".$ext";
  					$target = "images/$newname";
  					if(!file_exists($target)) {
  						move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);
  					}
  				} while(file_exists($target));
    		}
    		echo "<h3>จัดเก็บไฟล์เรียบร้อยแล้ว</h3>";
    	}
    }
    else // ถ้าไม่ได้อัพไฟล์มา
    {
      echo "ถ้าไม่ได้อัพไฟล์มา";
    }
  }
}

 ?>
