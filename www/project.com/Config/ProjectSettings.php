<?php
namespace Config;

use Libs\Controllers\NotFoundController;
use TaskApp\TaskApplication;
use Libs\Auth\AuthApplication;

class ProjectSettings {
  public const IS_DEBUG = true;

  public const APPLICATIONS = [
    # クラス名::class = クラスの場所を出力するキーワード
    ConfigApplication::class,
    AuthApplication::class,
    TaskApplication::class,
  ];

  # URLがこのパターンにマッチしたときに登録されている正規表現でのパターンに
  # 一致しているものを登録されているresolve関数を使用する。
  public const ROUTING_TABLE_CLASSES = [
    ['/^tasks(\/|)/', \TaskApp\RoutingTable::class],
    ['/^auth(\/|)/', \Libs\Apps\Auth\RoutingTable::class],
  ];

  public const NOT_FOUND_CONTROLLER = NotFoundController::class;
}
?>