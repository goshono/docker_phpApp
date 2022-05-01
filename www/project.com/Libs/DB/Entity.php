<?php
namespace Libs\DB;

abstract class Entity {
  public string $id;
  public abstract static function columns();
}
?>