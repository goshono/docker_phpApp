<?php
namespace Libs\Https;

use LDAP\Result;

class Request {
  private static Request $instance;
  private array $headers;

  private function __construct() {
    $this->headers = getallheaders();
  }

  public static function instance() : Request {
    if (empty(self::$instance)) {
      self::$instance = new Request();
    }
    return self::$instance;
  }

  public function methodType():string {
    if (is_null($this->post('_method'))){
      # $_SERVER変数
      # サーバー情報、実行時の環境情報を持つ配列
      # ページにアクセスする際に使用されたリクエストのメソッド名を取得する
      return $_SERVER['REQUEST_METHOD'];
    }
    return $this->post('_method');
  }

  public function get(string $name, $defalut = null) {
    if (isset($_GET[$name])){
      return $_GET[$name];
    }

    return $defalut;
  }

  public function post($name, $default = null) {
    # isset : 変数が宣言されていること、nullではないことを検査する
    if (isset($_POST[$name])){
      # ポスト変数
      # HTTPメソッドのPOSTメソッドで送信された値を取得する変数（連想配列である）
      return $_POST[$name];
    }
    return $default;
  }

  /** 
  * @param null $name
  * @return array | string
  */
  public function header($name = null) {
    if (empty($name)) {
      return getallheaders();
    }
    return empty($this->headers[$name]) ? '' : $this->headers[$name];
  }

  public function host() {
    if (!empty($_SERVER['HTTP_HOST'])) {
      return $_SERVER['HTTP_HOST'];
    }
    return $_SERVER['SERVER_NAME'];
  }
  
  public function requestUri() : string {
    return $_SERVER['REQUEST_URI'];
  }

  public function baseUrl() {
    // echo '$_SERVER[SCRIPT_NAME]: '. "{$_SERVER['SCRIPT_NAME']}"."<br>";
    # 現在のスクリプト（Request.php）のパス
    $script_name = $_SERVER['SCRIPT_NAME'];
    $request_uri = $this->requestUri();
    
    # strposは、特定の文字を含むかのチェックを行う。
    # 該当する文字列が見つかった場合は、位置を数値で返す。
    # 見つからない場合はfalseを返す
    if (0 === strpos($request_uri, $script_name)) {
      return $script_name;
    } else if (0 === strpos($request_uri, dirname($script_name))) {
      # dirname : 親ディレクトリのパスを返す
      return rtrim(dirname($script_name));
    }

    return '';
  }

  public function pathInfo() :string {
    $base_url = $this->baseurl();
    $request_uri = $this->requestUri();

    $pos = strpos($request_uri, '?');
    if (false !== $pos) {
      $request_uri = substr($request_uri, 0, $pos);
    }
    $path_info = (string)substr($request_uri, strlen($base_url));
    return $path_info;
  }
  
}
?>