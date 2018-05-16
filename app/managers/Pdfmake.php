<?php
namespace App\Managers;
class Pdfmake extends Manager
{
  public function index($req, $res)
  {
    return $this->view->render($res, 'pdfmake.phtml');
  }

  public function getPdf($req, $res) {
    return $this->view->render($res, 'pdfmake.phtml');
  }

  public function postPdf($req, $res) {


  }
}

 ?>
