<?php

require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../controllers/AuthController.php";
require_once __DIR__ . "/../controllers/StudentController.php";

class ControllerFactory
{
  public static function createController(string $controller)
  {
    return match ($controller) {
      "student" => new StudentController(),
      "auth" => new AuthController()
    };
  }
}
