<?php
namespace Libs\Views;

use Config\DirectorySettings;

# テンプレートファイルを読み込む
class View {

  # 空の配列の作成
  protected array $_defaultData = [];

  public function __construct() {
    $this->_defaultData['escape'] = $this->escape();
  }

  public function render($file_path_after_templates_dir, $_data = array()) {
    $_file = DirectorySettings::TEMPLATES_ROOT_DIR
        . $file_path_after_templates_dir . '.tmp.php';
    
    # extract : 連想配列を引数とし、そのキーを変数名、値を変数の値として処理する。
    extract(array_merge($this->_defaultData, $_data));
    
    # 出力を溜め込む
    ob_start();
    # 溜め込み先のバッファの上限を無効化
    ob_implicit_flush(0);
    # テンプレートファイル読み込み（出力されない）
    require $_file;
    # 溜め込んだ出力を変数contentに代入
    $content = ob_get_clean();

    return $content;
  }

  # エスケープ機能を提供する
  public function escape() {
    return function ($string, $echo = true) {
      $value = htmlspecialchars($string,ENT_QUOTES < 'UTF-8');
      if(!$echo) {
        return $value;
      }
      echo $value;
    };
  }
}
?>