<?php

class PaymentFacade {
  public function payments(){
    include("./app/views/PaymentView.php");
    include("./app/models/entities/Payment.php");
    $pv = new PaymentView();
    $p = new Payment();
    $pv->formPayments($p->list());
  }
}
?>