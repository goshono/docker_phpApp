<?php
namespace Libs\Utils;

# AutoLoaderは、毎回requireするのが面倒なので、自動でrequireする機能
class AutoLoader {
  private string $system_root_dir;
  private array $application_root_dir;

  public function __construct(string $root_dir) {
    $this->system_root_dir      = $root_dir;
    $this->application_root_dir = array($this->system_root_dir);
  }

  public function run() {
    # SPL(Standard PHP Library)
    # 本ファイルでrequireしていない未定義のクラスを探しに行く
    # 救済メソッドがなぜ配列なのか？
    spl_autoload_register(array($this, "loadClass")); 
  }

  public function loadClass($class) {

    $php_file = $this->create_php_file_path($class);
    if (is_readable($php_file)) {
      require_once($php_file);
      return;
    }
  }

  # クラス名を引数に受け取る
  # @return : $result = クラス名.phpファイルのフルパスを返す。
  private function create_php_file_path($class){  

    foreach ($this->application_root_dir as $dir) {

      $pieces = array($dir);
      
      # ltrim : 文字列左端が"\"でなくなるまで取り除く
      $class_with_name_space = ltrim($class, '\\'); 

      # array_merge : 配列の統合
      # explode     : 文字列の分割して配列にする
      $pieces = array_merge($pieces, explode('\\', $class_with_name_space));

      # implode : 配列要素をseparatorを挟んで文字列にして返す
      $result = implode(DIRECTORY_SEPARATOR, $pieces).".php";

      if (is_readable($result)) return $result;
    }
    return null;
  }
}
?>