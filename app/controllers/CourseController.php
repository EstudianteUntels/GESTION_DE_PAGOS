<?php
require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/entities/Course.php";
class CourseController extends Controller{
  public function index(){}
  public function list(){
    $c = Course::get();
    return $c;
  }
  public function findById($key){
    
  }
  public function save(){
    
  }
}