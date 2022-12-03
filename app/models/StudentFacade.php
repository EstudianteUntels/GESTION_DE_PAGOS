<?php

class StudentFacade
{
  public function students()
  {
    include("./app/views/StudentView.php");
    include("./app/controllers/StudentController.php");
    $sv = new StudentView();
    $sc = new StudentController;
    $sv->show($sc->list());
  }
}