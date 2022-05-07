<?php
namespace Libs\Https;

class Session {

  private static Session $_instace;
  private static bool $is_session_started = false;
  private static bool $is_session_id_regenerated = false;

  public function __construct() {

    if (self::$is_session_started) return;

    $this->startSession();
  }

  public static function instance() {
    if (empty(self::$_instace)) {
      self::$_instace = new self();
    }
    return self::$_instace;
  }

  public function set($key, $value) {
    # セッションの登録
    # ブラウザを閉じるまでセッションの内容は保持される
    $_SESSION[$key] = $value;
  }

  public function get($key, $default = null) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  public function unSet($key) {
    unset($_SESSION[$key]);
  }

  public function clear() {
    $_SESSION = array();
  }

  public function regenerate($destroy = true) {
    if(self::$is_session_id_regenerated) {
      return;
    }
    session_regenerate_id($destroy);
    self::$is_session_id_regenerated = true;
  }

  private function startSession() :void {
    # セッションを手動で開始する
    session_start();
    self::$is_session_started = true;
  }
}
?>