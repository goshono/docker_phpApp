<?php
namespace TaskApp;

use TaskApp\Controllers\TasksController;

class RoutingTable extends \Libs\Routing\RoutingTable {

  # 変数urlPatternsに設定しておいて、一括で登録する。
  protected array $urlPatterns = [
    # ['パス', 'メソッド', 'コントローラのクラス', 'アクション名]
    ['', 'GET', TasksController::class, 'index'],
    ['int:id', 'GET', TasksController::class, 'detail'],
    ['', 'POST', TasksController::class, 'store'],
    ['create', 'GET', TasksController::class, 'create'],
    ['int:id/edit', 'GET', TasksController::class, 'edit'],
    ['int:id', 'PUT', TasksController::class, 'update'],
    ['int:id', 'DELETE', TasksController::class, 'delete']
  ];
}

?>