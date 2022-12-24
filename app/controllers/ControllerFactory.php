<?php

require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/AuthController.php";
require_once __DIR__ . "/StudentController.php";
require_once __DIR__ . "/CourseController.php";
require_once __DIR__ . "/PaymentController.php";

class ControllerFactory
{
  public static function createController(string $controller)
  {
    return match ($controller) {
      "student" => new StudentController(),
      "auth" => new AuthController(),
      "course" => new CourseController(),
      "payment" => new PaymentController(),
    };
  }
}
