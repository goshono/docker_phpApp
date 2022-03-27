<?php
require_once('Config/ProjectSettings.php');
require_once('Config/DirectorySettings.php');
require_once('Libs/Utils/AutoLoader.php');

# 名前空間に所属するクラスをあらかじめインポートするuse
# 一度インポートしてしまえば同じ名前空間を繰り返し書く必要がない
use Config\ProjectSettings;
use Config\DirectorySettings;
use Libs\Utils\AutoLoader;

if (ProjectSettings::IS_DEBUG) {
  ini_set('display_errors', 'On');
}

$auto_loader = new AutoLoader(DirectorySettings::APPLICATION_ROOT_DIR);
$auto_loader->run();

$project = \Libs\Project::instance();
?>