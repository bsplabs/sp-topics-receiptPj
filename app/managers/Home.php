<?php
namespace App\Managers;
class Home extends Manager{
  public function index($req, $res)
  {
    return $this->view->render($res, 'upload.phtml');
  }

  public function getHomepage($req, $res) {

    $sql = "SELECT * FROM file WHERE id=:id";
    $result = $this->db->prepare($sql);
    $result->bindParam("id", $_SESSION['user'],\PDO::PARAM_STR);
    $result->execute();
    $data = $result->fetchAll(\PDO::FETCH_OBJ);
    $vars['alldata'] = $data;
    $vars['type'] = "badge badge-warning";
    return $this->view->render($res, 'home.phtml',$vars);
  }

  public function finddataByName($request, $response) {
    $nameData = $request->getParsedBody()['username'];
    var_dump($nameData);
    $sql = "SELECT * FROM users WHERE username LIKE '%$nameData%'";
    $result = $this->db->prepare($sql);
    $result->execute();

    $data = $result->fetchAll(\PDO::FETCH_OBJ);

    $jData = array("name" => $data);
    echo \json_encode($jData);
  }

  public function showdata($request, $response) {
    $sql = "SELECT * FROM users";

    $result = $this->db->prepare($sql);
    $result->execute();

    $data = $result->fetchAll(\PDO::FETCH_OBJ);

    // echo json_encode($data);

    $vars['alldata'] = $data;
    return $this->view->render($response, 'home.phtml', $vars);
  }

  public function showdataById($request, $response) {
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $this->db->prepare($sql);
    $result->execute();

    $data = $result->fetch(\PDO::FETCH_OBJ);
    // echo json_encode($data);

    $vars['mydata'] = $data;

    return $this->view->render($response, 'home.phtml', $vars);
  }
}

 ?>
