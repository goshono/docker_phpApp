<?php
namespace Config;

use Libs\Controllers\NotFoundController;

class ProjectSettings {
  public const IS_DEBUG = true;

  public const APPLICATIONS = [
    # クラス名::class = クラスの場所を出力するキーワード
    ConfigApplication::class,
    TaskApplication::class,
  ];

  public const NOT_FOUND_CONTROLLER = NotFoundController::class;
}
?>