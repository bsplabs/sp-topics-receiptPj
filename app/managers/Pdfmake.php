<?php

namespace App\Managers;

class Pdfmake extends Manager
{
  public function index($req, $res)
  {
    return $this->view->render($res, 'pdfmake.phtml');
  }

  public function getPdf($req, $res)
  {
    return $this->view->render($res, 'pdfmake.phtml');
  }

  public function getMemmsgpage($req, $res)
  {
    return $this->view->render($res, 'memmsg.phtml');
  }

  public function postPdf($request, $response)
  {
    $main_section = $request->getParsedBody()['mainsection'];
    $number_order = $request->getParsedBody()['numberodr'];
    $date2do = $request->getParsedBody()['bday'];
    $name_story = $request->getParsedBody()['name_stry'];
    $first_msg = $request->getParsedBody()['firsttmsg'];
    $last_msg = $request->getParsedBody()['lastmsg'];
    $name_own = $request->getParsedBody()['ownname'];
    $pos_own = $request->getParsedBody()['position'];

    // $sql = "INSERT INTO memmessage VALUES (0,:ms,:no,:ns,:fm,:lm,:no,:po,now())";
    // $result = $this->db->prepare($sql);
    // $result->bindParam("ms", $main_section,\PDO::PARAM_STR);
    // $result->bindParam("no", $number_order,\PDO::PARAM_STR);
    // $result->bindParam("ns", $name_story,\PDO::PARAM_STR);
    // $result->bindParam("fm", $first_msg,\PDO::PARAM_STR);
    // $result->bindParam("lm", $last_msg,\PDO::PARAM_STR);
    // $result->bindParam("no", $name_own,\PDO::PARAM_STR);
    // $result->bindParam("po", $pos_own,\PDO::PARAM_STR);
    // $result->execute();

    $vars['memmsg'] = array(
      'main_s'=> $main_section,
      'number_o' => $number_order,
      'date2do' => $date2do,
      'name_sty' => $name_story,
      'f_msg' => $first_msg,
      'l_msg' => $last_msg,
      'name_own' => $name_own,
      'pos' => $pos_own
    );

    return $this->view->render($response, 'memmessage.phtml', $vars);


  }
}

 ?>
