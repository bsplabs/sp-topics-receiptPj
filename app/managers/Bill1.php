<?php
namespace App\Managers;

class Bill1 extends Manager
{

  public function getBill($request, $response)
  {
    unset($_SESSION['user']);
    return $this->view->render($response,'bill1.phtml');
  }

}

 ?>
