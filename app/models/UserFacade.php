<?php

class UserFacade
{
  public function users()
  {
    include("./app/views/UserView.php");
    include("./app/controllers/UserController.php");
    $uv = new UserView();
    $uc = new UserController();
    $uv->show($uc->list());
  }
}