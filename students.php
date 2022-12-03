<?php
include('./app/models/StudentFacade.php');
$authFacade = new StudentFacade();
$authFacade->students();