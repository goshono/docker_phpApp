<?php
# 名前空間によってクラスを階層的に管理することができる
namespace Libs;

use Libs\Https\Request;
use Libs\Https\Response;

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
    $content = '';
    $content .= 'Method Type:' . $this->_request->methodType() . '<br>';
    $content .= 'Header Connection: ' . $this->_request->header('Connection'). '<br>';
    $content .= 'Host :' . $this->_request->host() . '<br>';
    $content .= 'Request uri: ' . $this->_request->requestUri() . '<br>';
    $content .= 'Path info:' . $this-> _request->pathInfo() . '<br>';
    $content .= 'GET name:' . $this->_request->get('name') . '<br>';
    $content .= 'GET aaa:' . $this->_request->get('aaa') . '<br>';

    $response = new Response($content);
    $response ->send();
  }
}
?>