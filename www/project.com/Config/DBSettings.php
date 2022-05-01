<?php
namespace Config;

class DBSettings {

  public const USE_DB = true;
  public const USER = "sample_user";
  public const PASSWORD = "password";
  public const DRIVER = "pgsql";
  public const DB_NAME = "sampledb";
  public const HOST = "myapp-db";
  public const OPTIONS = [
      [\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION]
    ];
  public const REPOSITORIES_TABLE =
   [
     [
       'key' => "tasks",
       'table_name' => 'tasks',
       'entiry' => \TaskApp\Entities\Task::class,
       'repository' => \TaskApp\Repositories\TasksRepository::class
     ]
   ];
}
?>