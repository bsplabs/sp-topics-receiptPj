<?php
namespace App\Managers;

class Logout extends Manager
{

  public function getLogout($request, $response)
  {
    unset($_SESSION['user']);
    return $this->view->render($response,'index.phtml');
  }

}

 ?>
