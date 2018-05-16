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

  public function postUploadFile($req, $res)
  {
    $obj = $req->getParsedBody();

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
    		@mkdir("file2upload/".$_SESSION['user']); //ถ้ายังไม่มีไดเร็กทอรี ให้สร้างขึ้นใหม่

    		$target = "file2upload/".$_SESSION['user']."/".$_FILES['upload_file']['name'];
        $newname = $_FILES['upload_file']['name'];

    		if(file_exists($target))
        {
          $oldname = pathinfo($_FILES['upload_file']['name'], PATHINFO_FILENAME);
          $ext =  pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION);
          $newname = $oldname;
  				do {
  					$r = rand(1000,9999);
  					$newname = $oldname."_".$r.".$ext";
  					$target = "file2upload/".$_SESSION['user']."/".$newname;
  				} while(file_exists($target));
    		}

        move_uploaded_file($_FILES['upload_file']['tmp_name'], $target);

        $sql = "INSERT INTO file VALUES (0,:file_name,:file_path,:name_doc,:describ,:id)";
        $result = $this->db->prepare($sql);
        $result->bindParam("file_name", $newname,\PDO::PARAM_STR);
        $result->bindParam("file_path", $target,\PDO::PARAM_STR);
        $result->bindParam("name_doc", $obj['name_doc'],\PDO::PARAM_STR);
        $result->bindParam("describ", $obj['describ'],\PDO::PARAM_STR);
        $result->bindParam("id", $_SESSION['user'],\PDO::PARAM_STR);
        $result->execute();
        $msg['success'] = "จัดเก็บไฟล์เรียบร้อยแล้ว";
        return $this->view->render($res, 'upload.phtml',$msg);
    	}
    }
    else // ถ้าไม่ได้อัพไฟล์มา
    {
      echo "ถ้าไม่ได้อัพไฟล์มา";
    }
  }
}

 ?>
