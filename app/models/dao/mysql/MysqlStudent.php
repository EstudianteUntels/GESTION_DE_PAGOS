<?php
require_once __DIR__ . "/../interfaces/DAO.php";
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
      $query = "SELECT * FROM student";
      return $this->connection->query($query)->fetchAll();
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
}