<?php
namespace TaskApp\Controllers;

use Libs\Controllers\Controller;
use Libs\Https\Response;
use TaskApp\Entities\Task;

class TasksController extends Controller {

  private $_repository;

  public function __construct() {
    parent::__construct();
    $this->_repository = \Libs\DB\DBManager::instance()->repository('tasks');
  }

  public function index($params) {
    $data = ['tasks' => $this->_repository->all()];
    return $this->render('tasks/index', $data);
  }
  

  public function detail($params) {
    // echo \Libs\Https\Session::instance()->get('task_id') . '<br>';
    $task = $this->_repository->get($params['id']);
    // \Libs\Https\Session::instance()->set('task_id', $params['id']);
    if (is_null($task)) {
      return $this->render404();
    }
    return $this->render('tasks/detail', ['task' => $task]);
  }

  public function create($params) {
    return $this->render('tasks/create');
  }

  public function store($params) {
    $task = new Task();
    $task->title = $this->_request->post('title');
    $task->status = $this->_request->post('status');
    $this->_repository->insert($task);
    return $this->redirect('/tasks/');
  }

  public function edit($params) {
    $task = $this->_repository->get($params['id']);
    if (is_null($task)) {
      return $this->render404();
    }
    return $this->render('tasks/edit', ['task'=>$task]);
  }

  public function update($params) {
    $task = $this->_repository->get($params['id']);
    if (is_null($task)) {
      return $this->render404();
    }

    $task->title = $this->_request->post('title');
    $task->status = $this->_request->post('status');

    $this->_repository->update($task);
    return $this->redirect(('/tasks/' . $params['id']));
  }

  public function delete($params) {
    $this->_repository->delete($params['id']);
    return $this->redirect('/tasks/');
  }
}
?>