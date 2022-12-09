<?php

require_once __DIR__.'/../core/Controller.php';
require_once __DIR__."/../core/Http.php";
require_once __DIR__."/../models/entities/Payment.php";
class PaymentController extends Controller{
  public function index(){}
  public function list(){
    $instance = new Payment();
    $ps = $instance->list();
    return $ps;
  }
  public function findById($key){
    
  }
  public function save(){
    
  }
}