<?php
namespace Config;

class ProjectSettings {
  public const IS_DEBUG = true;
  public const APPLICATIONS = [
    # クラス名::class = クラスの場所を出力するキーワード
    ConfigApplication::class,
  ];
}
?>