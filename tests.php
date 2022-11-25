<?php

require_once __DIR__."/app/controllers/StudentController.php";

$s = new StudentController();

var_dump($s->list());