<?php

class PaymentFacade {
  public function payments(){
    include("./app/views/PaymentView.php");
    include("./app/controllers/PaymentController.php");
    $pv = new PaymentView();
    $pc = new PaymentController();
    $pv->formPayments($pc->list());
  }
}
?>