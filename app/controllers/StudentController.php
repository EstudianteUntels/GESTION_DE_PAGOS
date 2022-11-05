<?php

require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/dao/mysql/MysqStudent.php";
class StudentController extends Controller{
  public function index(){}
  public function list(){
    $instance = new MysqStudent();
    $student = $instance->show();
    return $student;
  }
}