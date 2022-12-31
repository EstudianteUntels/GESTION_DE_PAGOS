<?php
require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/entities/User.php";
class UserController extends Controller{
  public function index(){}
  public function list(){
    return User::list();
  }
  public function findById($key){
    
  }
  public function save(){
  }
}