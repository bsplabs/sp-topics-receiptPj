<?php
namespace App\Managers;

class Bill2 extends Manager
{

  public function getBill($request, $response)
  {
    unset($_SESSION['user']);
    return $this->view->render($response,'bill2.phtml');
  }

}

 ?>
