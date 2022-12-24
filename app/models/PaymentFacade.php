<?php

class PaymentFacade {
  private PaymentController $paymentController;
  public function __construct()
  {
    include("./app/controllers/PaymentController.php");
    $this->paymentController = new PaymentController(); 
  }

  public function payments(){
    include("./app/views/PaymentView.php");
    $pv = new PaymentView();
    $pv->formPayments($this->paymentController->list());
  }
  public function report(){
    include("./app/views/PaymentReportView.php");
    $prv = new  PaymentReportView();
    $prv->showReport();
  }
}
?>