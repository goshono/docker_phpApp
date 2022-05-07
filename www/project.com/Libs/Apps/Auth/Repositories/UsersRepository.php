<?php

namespace Libs\Apps\Auth\Repositories;

use Libs\DB\Repository;
use Libs\Apps\Auth\Entities\User;

class UsersRepository extends Repository {

  protected function entityClass() {
    return User::class;
  }

  public function isUniqueName($name) {
    $user = $this->where('name', '=', $name);
    return empty($user);
  }

  public function add($name, $password) {
    $user = new User();
    $user->name = $name;
    $user->password = password_hash($password, PASSWORD_BCRYPT);
    $this->insert($user);
  }
}

?>