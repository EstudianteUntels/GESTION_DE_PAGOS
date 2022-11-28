<?php
require_once __DIR__ . "/../interfaces/DAO.php";
require_once __DIR__ . "/../../entities/Student.php";
require_once "MysqlConnection.php";
class MysqStudent implements DAO
{
  public $conn = null;
  public function __construct()
  {
    $this->conn =  MysqlConnection::getInstanceDB()->getConnection();
  }
  public function __destruct()
  {
    MysqlConnection::closeConnection();
  }
  public function update($object)
  {

    try {
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
  public function insert($object)
  {
    extract($object);
    try {
      $res = $this->conn->query("SELECT * FROM student where id_no ='$id_no' ".(!empty($id) ? " and id != {$id} " : ''));
      if($res->rowCount() > 0){
        return 2;
        exit;
      }
      $query = is_null($object['id']) ? "INSERT INTO student set id_no='$id_no', name='$name', contact='$contact', address='$address', email='$email'" :
      "UPDATE student set id_no='$id_no', name='$name', contact='$contact', address='$address', email='$email' where id = $id";
      $this->conn->query($query);
      return 1;
      // return $object;
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage() . "\n");
      return false;
    }
  }
  public function delete($key)
  {
    try {
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
  public function show()
  {
    try {
      $query = "SELECT * FROM student";
      $arr = [];
      foreach ($this->conn->query($query)->fetchAll() as $row) {
        $s = new Student();
        $s->id = $row['id'];
        $s->id_no = $row['id_no'];
        $s->name = $row['name'];
        $s->contact = $row['contact'];
        $s->address = $row['address'];
        $s->email = $row['email'];
        $s->date_created = $row['date_created'];
        array_push($arr,$s);
      }
    return $arr;
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
  public function showById($key)
  {
    try {
      $query = "SELECT * FROM student WHERE id = '$key'";
      return $this->conn->query($query)->fetchObject();
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
}