<?php
namespace App\Managers;

class Login extends Manager
{
  public function postLogin($request, $response)
  {
      $user = $request->getParsedBody()['username'];
      $pass = $request->getParsedBody()['password'];

      $sql = "SELECT * FROM users WHERE (username=:user) AND (password=:pass)";
      $result = $this->db->prepare($sql);
      $result->bindParam("user", $user,\PDO::PARAM_STR);
      $result->bindParam("pass", $pass,\PDO::PARAM_STR);
      $result->execute();

      $data = $result->fetch(\PDO::FETCH_OBJ);

      $count = $result->rowCount();

      if($count > 0)
      {
        $_SESSION['user'] = $data->id;
        $_SESSION['name'] = $data->name;
        return $this->view->render($response, 'home.phtml');
      }


    //var_dump($data);

  }

}

 ?>
