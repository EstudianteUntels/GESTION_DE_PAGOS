<?php
require_once __DIR__.'/../dao/mysql/MysqlConnection.php';
class Course {
  public string $id;
  public string $course;
  public string $description;
  public string $level;
  public float $total_amount;
  public string $date_created;

  public function __construct()
  {
  }

  public static function get(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    $list = $conn->query("SELECT * FROM courses  order by course asc ");
    $arr = [];
    foreach ($list->fetchAll() as $row) {
      $c = new Course();
      $c->id = $row['id'];
      $c->course = $row['course'];
      $c->description = $row['description'];
      $c->level = $row['level'];
      $c->total_amount = $row['total_amount'];
      $c->date_created = $row['date_created'];
      array_push($arr,$c);
    }
    return $arr;
  }
}