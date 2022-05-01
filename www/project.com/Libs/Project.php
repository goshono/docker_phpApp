<?php
# 名前空間によってクラスを階層的に管理することができる
namespace Libs;

use Config\ProjectSettings;
use Libs\Controllers\Controller;
use Libs\DB\DBManager;
use Libs\Https\Request;
use Libs\Routing\Router;

class Project {
  private static Project $_instance;
  private Request $_request;
  private Router $_router;

  private function __construct() {
    $this->_request = Request::instance();
    $this->_router = new Router(ProjectSettings::ROUTING_TABLE_CLASSES);
    DBManager::instance();
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
    $result = $this->_router->resolve($this->_request);
    if (is_null($result)) {
      $controller = \Config\ProjectSettings::NOT_FOUND_CONTROLLER;
      return [new $controller(), 'index', []];
    }

    return [new $result['class'], $result['action'], $result['params']];
  }

  private function _actionController(
    Controller $controller,
    string $action,
    array $params ) {
      return $controller->run($action, $params);
  }
}
?>