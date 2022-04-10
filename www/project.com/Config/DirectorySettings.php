<?php
namespace Config;

class DirectorySettings {
  # __DIR__:マジック定数。現在のファイルが存在するディレクトリ名（絶対パス）
  # DIRECTORY_SEPARTOR はphpの定義済み定数
  # APPLICATION_ROOT_DIR = /var/www/project.com/Config/../
  public const APPLICATION_ROOT_DIR = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
  public const TEMPLATES_ROOT_DIR = self::APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR;
  // public const TEMPLATES_ROOT_DIR = self::APPLICATION_ROOT_DIR . "templates" . DIRECTORY_SEPARATOR;
}

?>