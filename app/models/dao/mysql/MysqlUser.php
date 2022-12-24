<?php
require_once __DIR__ . "/../interfaces/DAO.php";
require_once "MysqlConnection.php";
class MysqlUser implements DAO
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
    try {
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
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
  public function showById($key)
  {
    try {
    } catch (Exception $e) {
      exit("ERROR: " . $e->getMessage());
    }
  }
  public function updatePassword($hashed_password,$id){
    $this->conn->query("UPDATE users SET password='".$hashed_password."' WHERE id=$id");
  }
  public function selectParams($options = [], $where = [])
  {
    $filters = '';
    $query = "";
    if (empty($options)) {
      $filters = "*";
    } else {
      foreach ($options as $option) {
        $filters .= $option . ",";
      }
      $filters = substr($filters, 0, -1);
    }
    if (empty($where))
      $query = "SELECT {$filters} FROM users";
    else {
      $condiciones = [];
      foreach ($where as $key => $value) {
        if ($value != '') {
          $condiciones[] = "{$key}'{$value}'";
        }
      }
      $str = implode(' AND ',$condiciones);
      $query = "SELECT {$filters} FROM users WHERE {$str}";
    }
    return $this->conn->query($query)->fetchAll();
  }
}
