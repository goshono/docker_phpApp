<?php
# 名前空間によってクラスを階層的に管理することができる
namespace Libs;

use Libs\Controllers\Controller;
use Libs\Https\Request;
use Libs\Https\Response;
use TaskApp\Controllers\TasksController;

class Project {
  private static Project $_instance;
  private Request $_request;

  private function __construct() {
    $this->_request = Request::instance();
  }

  public static function instance() {
    if (empty(self::$_instance)) {
      self::$_instance = new Project();
    }

    return self::$_instance;
  }
  public function run() {
 
    list($controller, $action, $params) = $this->_selectController();
    $response = $this->_actionController($controller, $action, $params);
    $response->send();
  }

  private function _selectController() {
    $controller = new TasksController();
    $action = 'detail'; # 動作確認用
    $params = ['id' => 1];
    return [$controller, $action, $params];
  }

  private function _actionController(
    Controller $controller,
    string $action,
    array $params ) {
      return $controller->run($action, $params);
  }
}
?>