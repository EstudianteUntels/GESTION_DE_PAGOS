<?php

require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/dao/mysql/MysqlUser.php";
class AuthController extends Controller{
  public function index(){}
  public function create($data) {
    if(!Http::isRequestMethod('POST'))
        return;
  }
  public function login(){
    if(!Http::isRequestMethod('POST'))
      return;
    extract($_POST);
    $instance = new MysqlUser();
    $user = $instance->selectParams([],['username='=>$username,'password='=>md5($password)]);
    if(empty($user)){
      return 3;
    }
    foreach ($user[0] as $key => $value) {
      if(!is_numeric($key)) $_SESSION['login_'.$key] = $value;
    }
    return 1;
  }

  public function logout(){
    if(!Http::isRequestMethod('GET'))
      return;
    session_destroy();
    foreach ($_SESSION as $key => $value) {
      unset($_SESSION[$key]);
    }
    header("location:login.php");
  }
}