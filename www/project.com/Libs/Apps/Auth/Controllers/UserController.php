<?php
namespace Libs\Apps\Auth\Controllers;

use Libs\Apps\Auth\Services\AuthService;
use Libs\Controllers\Controller;

class UserController extends Controller {

  public function myPage($params) {
    if (AuthService::isAuthenticated() === false) {
      return $this->redirect('/auth/login');
    }
    
    return $this->render(
      'auth/my_page',
      ['user' => AuthService::getLoginUser()]
    );
  }

  public function signupForm($params) {
    return $this->render('auth/sign_up');
  }

  public function signup($prams) {
    $errors = AuthService::addNewUser(
                $this->_request->post('name'),
                $this->_request->post('password'));
    if (count($errors) === 0) {
      return $this->redirect('/auth');
    }
    return $this->render('auth/sign_up', ['errors'=>$errors]);
  }

  public function loginForm($params) {
    return $this->render('auth/login');
  }

  public function login($params) {
    $faild_result = $this->render('auth/login', ['error' => 'Name or password is incorrect.']);
    $user = AuthService::getUser($this->_request->post('name'));
    
    if (is_null($user)) {
      return $faild_result;
    }

    if (AuthService::login($user, $this->_request->post('password'))) {
      return $this->redirect('/auth/');
    }

    return $faild_result;

  }

  public function logout($params) {
    AuthService::logout();
    return $this->redirect('/auth/login');
  }
}
?>