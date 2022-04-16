<?php
namespace TaskApp;

use TaskApp\Controllers\TasksController;

class RoutingTable extends \Libs\Routing\RoutingTable {

  # 変数urlPatternsに設定しておいて、一括で登録する。
  protected array $urlPatterns = [
    # ['パス', 'メソッド', 'コントローラのクラス', 'アクション名]
    ['str:name', 'GET', TasksController::class, 'index'],
    ['detail/int:id', 'GET', TasksController::class, 'detail'],
  ];
}

?>