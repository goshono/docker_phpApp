<?php
namespace TaskApp\Controllers;

use Libs\Controllers\Controller;
use Libs\Https\Response;

class TasksController extends Controller {

  public function index($params) {
    return new Response("This is index of tesk controller.");
  }

  public function detail($params) { 
    return new Response("This is detail of tasl controller.<br> id:" . $params['id']);
  }
}

?>