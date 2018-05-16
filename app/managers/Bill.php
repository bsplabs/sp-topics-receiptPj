<?php
namespace App\Managers;

class Bill extends Manager
{

  public function getBill($request, $response)
  {
    unset($_SESSION['user']);
    return $this->view->render($response,'bill.phtml');
  }

}

 ?>
