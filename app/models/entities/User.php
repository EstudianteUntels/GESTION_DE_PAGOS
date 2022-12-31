<?php
require_once __DIR__.'/../dao/mysql/MysqlConnection.php';
class User{
  public $id;
  public $name;
  public $username;
  public $type;

  public static function list(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    $type = array("", "Admin", "Staff", "Alumnus/Alumna");
    $list = $conn->query("SELECT * FROM users order by name asc");
    $arr = [];
    foreach ($list->fetchAll() as $row) {
      $c = new User();
      $c->id = $row['id'];
      $c->name = $row['name'];
      $c->username = $row['username'];
      $c->type = $type[$row['type']];
      array_push($arr,$c);
    }
    return $arr;
  }
}
