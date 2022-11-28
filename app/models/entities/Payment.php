<?php
// https://www.youtube.com/watch?v=BHAYO6esXlw

require_once __DIR__.'/../dao/mysql/MysqlConnection.php';

class Payment
{
  public string $id;
  public string $ef_id;
  public float $amount;
  public string $remarks;
  public string $date_created;
  
  public function __construct() {}

  public function save(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    $save = $conn->query("INSERT INTO payments set ef_id");
    // return json_encode(array('ef_id'=>$ef_id, 'pid'=>$id,'status'=>1));
  }
  public function list(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    $get = $conn->query("SELECT p.*,s.name as sname, ef.ef_no,s.id_no FROM payments p inner join student_ef_list ef on ef.id = p.ef_id inner join student s on s.id = ef.student_id order by unix_timestamp(p.date_created) desc");
    return $get->fetchAll();
  }
  public function update(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    // $save = $conn->query("UPDATE payments set $data where id = $id");
    // return json_encode(array('ef_id'=>$ef_id, 'pid'=>$id,'status'=>1));
  }
  public function delete(){}
}
