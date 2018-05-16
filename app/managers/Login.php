<?php
namespace App\Managers;

class Login extends Manager
{
  public function getLogin($req, $res)
  {
    return $this->view->render($res, 'login.phtml');
  }

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
        $sql = "SELECT * FROM file WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindParam("id", $_SESSION['user'],\PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetchAll(\PDO::FETCH_OBJ);
        $vars['alldata'] = $data;
        return $this->view->render($response, 'home.phtml',$vars);
      }


    //var_dump($data);

  }

}

 ?>
