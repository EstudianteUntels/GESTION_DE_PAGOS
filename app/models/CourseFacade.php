<?php

class CourseFacade {
  public function courses(){
    include("./app/views/CoursesView.php");
    include("./app/controllers/CourseController.php");
    $cv = new CoursesView();
    $cc = new CourseController();
    $cv->formCourses($cc->list());
  }
}
?>