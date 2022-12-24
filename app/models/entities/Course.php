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

  public static function save(){
    $conn = MysqlConnection::getInstanceDB()->getConnection();
    extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','fid','type','amount')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $conn->query("SELECT * FROM courses where course ='$course' and level ='$level' ".(!empty($id) ? " and id != {$id} " : ''))->rowCount();
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $conn->query("INSERT INTO courses set $data");
			if($save){
				// $id = $this->db->insert_id;
				$id = $conn->lastInsertId();
				foreach($fid as $k =>$v){
					$data = " course_id = '$id' ";
					$data .= ", description = '{$type[$k]}' ";
					$data .= ", amount = '{$amount[$k]}' ";
					$save2[] = $conn->query("INSERT INTO fees set $data");
				}
				if(isset($save2))
						return 1;
			}
		}else{
			$save = $conn->query("UPDATE courses set $data where id = $id");
			if($save){
				$conn->query("DELETE FROM fees where course_id = $id and id not in (".implode(',',$fid).") ");
				foreach($fid as $k =>$v){
					$data = " course_id = '$id' ";
					$data .= ", description = '{$type[$k]}' ";
					$data .= ", amount = '{$amount[$k]}' ";
					if(empty($v)){
						$save2[] = $conn->query("INSERT INTO fees set $data");
					}else{
						$save2[] = $conn->query("UPDATE fees set $data where id = $v");
					}
				}
				if(isset($save2))
						return 1;
			}
		}
  }
}