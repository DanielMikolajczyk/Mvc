<?php

class User extends Model
{
  protected $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email',$email);

    if($this->db->rowCount() > 0)
    {
      return true;
    }else{
      return false;
    }
  }

  public function register($username,$email,$password)
  {
    $this->db->query('INSERT INTO users (username,email,password) VALUES (:username,:email,:password)');
    $this->db->bind(':username',$username);
    $this->db->bind(':email',$email);
    $this->db->bind(':password',$password);
    $this->db->execute();
  }

  public function login($username, $password)
  {
    $this->db->query('SELECT username, password FROM users WHERE username = :username');
    $this->db->bind(':username', $username);
    $row = $this->db->single();
    return password_verify($password,$row->password);
  }

  public function getUserIdByUsername($username)
  {
    $this->db->query('SELECT id FROM users WHERE username = :username');
    $this->db->bind(':username', $username);
    return $this->db->single()->id;
  }

  public function getUserNameById($id)
  {
    $this->db->query('SELECT username FROM users WHERE id = :id');
    $this->db->bind(':id',$id);
    return $this->db->single();
  }
}