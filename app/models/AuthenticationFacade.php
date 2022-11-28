<?php
class AuthenticationFacade {
  public function authentication(){
      include('header.php');
      include('footer.php');
    
      if (isset($_SESSION['login_id']))
        header("location:index.php?page=payments");
      else {
        include_once("./app/views/Principal.php");
        $principal = new Principal();
        $principal->formPrincipal();
      }
  }
}
?>