<?php

require_once DIR.'/../core/Controller.php';
require_once DIR."/../core/Http.php";
require_once DIR."/../models/dao/mysql/MysqlUser.php";
require_once DIR."/../models/Encrytor.php";
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
    // $user = $instance->selectParams([],['username='=>$username,'password='=>md5($password)]);
    $user = $instance->selectParams([],['username='=>$username,'password='=>Md5Encryptor::encrypt($password)]);
    if(empty($user)){
      return 3;
    }
    foreach ($user[0] as $key => $value) {
      if(!is_numeric($key)) $SESSION['login'.$key] = $value;
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