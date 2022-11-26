<?php

require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/dao/mysql/MysqlStudent.php";
class StudentController extends Controller{
  public function index(){}
  public function list(){
    $instance = new MysqStudent();
    $student = $instance->show();
    return $student;
  }
  public function findById($key){
    $instance = new MysqStudent();
    $student = $instance->showById($key);
    return $student;
  }
  public function save(){
    extract($_POST);
    $instance = new MysqStudent();
    $response = $instance->insert([
      'id_no'=>$id_no,
      'name'=>$name,
      'contact'=>$contact,
      'address'=>$address,
      'email'=>$email,
      'id'=> empty($id) ? NULL : $id 
    ]);
    return $response;
  }
}