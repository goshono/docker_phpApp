<?php
# 名前空間によってクラスを階層的に管理することができる
namespace Libs;

class Project {
  private static Project $_instance;
  
  private function __construct() {
  }

  public static function instance() {
    if (empty(self::$_instance)) {
      self::$_instance = new Project();
    }

    return self::$_instance;
  }
  public function run() {
    echo "Project is running";
  }
}
?>