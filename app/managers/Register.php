<?php
namespace App\Managers;

class Register extends Manager
{
  public function getRegister($request, $response)
  {
    return $this->view->render($response, 'register.phtml');
  }

  public function postRegister($request, $response)
  {
    $user = $request->getParsedBody()['username'];
    $name = $request->getParsedBody()['fullname'];
    $pass = $request->getParsedBody()['password'];

    $sql = "INSERT INTO users VALUES (0,:name,:user,:pass,now())";
    $result = $this->db->prepare($sql);
    $result->bindParam("name", $name,\PDO::PARAM_STR);
    $result->bindParam("user", $user,\PDO::PARAM_STR);
    $result->bindParam("pass", $pass,\PDO::PARAM_STR);
    $result->execute();
    $data['insertBool'] = true;
    return $this->view->render($response, 'register.phtml',$data);
  }

}

 ?>
