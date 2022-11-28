<?php

include("./app/views/CoursesView.php");
include("./app/models/entities/Course.php");

$courses = Course::get();

$cv = new CoursesView();
$cv->formCourses($courses);