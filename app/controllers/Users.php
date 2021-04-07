<?php
require_once APPROOT . '/helpers/setNewSession.php';

class Users extends Controller
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function login()
  {
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
      //Return login view
      return $this->view('/users/login');
    }

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'username' => trim($_POST['username']),
      'password' => trim($_POST['password']),
      'usernameError' => '',
      'passwordError' => ''
    ];

    $nameValidation = "/^[a-zA-Z0-9]*$/";
    $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

    //Validate username
    if(empty($data['username']))
    {
      $data['usernameError'] = 'Please enter username.';
    }elseif(!preg_match($nameValidation,$data['username']))
    {
      $data['usernameError'] = 'Please enter valid username.';
    }

    //Validate password
    if(empty($data['password']))
    {
      $data['passwordError'] = 'Please enter password';
    }elseif(!preg_match($passwordValidation,$data['password']))
    {
      $data['passwordError'] = 'Please enter valid password';
    }

    if(!empty($data['usernameError']) || !empty($data['passwordError']))
    {
      return $this->view('/users/login',$data);
    }

    if($this->userModel->login($data['username'], $data['password']))
    {
      //Set new session
      $userid = $this->userModel->getUserIdByUsername($data['username']);
      setSession($userid,$data['username'],$data['email']);
      //Login success
      header('location: ' . URLROOT . '/posts/index');
    }else{
      $data['passwordError'] = 'Invalid data.';
    }

    //Login fail
    return $this->view('/users/login',$data);

  }

  public function register()
  {
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
      //Return register view
      return $this->view('/users/register');
    }
    //Else POST request -> try to register new user
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'username' => trim($_POST['username']),
      'email' => trim($_POST['email']),
      'password' => trim($_POST['password']),
      'confirmPassword' => trim($_POST['confirmPassword']),
      'usernameError' => '',
      'emailError' => '',
      'passwordError' => '',
      'confirmPasswordError' => ''
    ];

    $nameValidation = "/^[a-zA-Z0-9]*$/";
    $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

    //Validate username
    if(empty($data['username']))
    {
      $data['usernameError'] = 'Username is required.';
    }elseif(!preg_match($nameValidation,$data['username']))
    {
      $data['usernameError'] = 'Username is invalid.';
    }

    //Validate password
    if(empty($data['password']))
    {
      $data['passwordError'] = 'Password is required.';
    }
    elseif(strlen($data['password']) < 6)
    {
      $data['passwordError'] = 'Password is too short.';
    }
    elseif(!preg_match($passwordValidation,$data['password']))
    {
      $data['passwordError'] = 'Password is invalid.';
    }
    elseif($data['password'] != $data['confirmPassword'])
    {
      $data['confirmPasswordError'] = 'Passwords do not match.';
    }

    //Validate email
    if(empty($data['email']))
    {
      $data['emailError'] = 'Email is required.';
    }
    elseif(!filter_var($data['email'],FILTER_SANITIZE_EMAIL))
    {
      $data['emailError'] = 'Invalid email.';
    }
    elseif($this->userModel->findUserByEmail($data['email']))
    {
      $data['emailError'] = 'Email already taken.';
    }
    //Check Errors
    if(empty($data['usernameError']) && empty($data['passwordError']) &&
    empty($data['confirmPasswordError']) && empty($data['emailError']))
    {
      //Register new User
      $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
      $this->userModel->register($data['username'],$data['email'],$data['password']);
    }else{
      return $this->view('users/register',$data);
    }
    $data['success'] = 1;

    return $this->view('users/register', $data);
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    return $this->view('users/login');
  }

}