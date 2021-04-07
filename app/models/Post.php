<?php

class Post extends Model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function validateData($data)
  {
    //Validate data for method post
    return filter_var_array($data, FILTER_SANITIZE_STRING);
  }

  public function findAllPosts()
  {
    $this->db->query('SELECT * FROM posts');
    return $this->db->resultSet();
  }

  public function findPostById($id)
  {
    $this->db->query('SELECT * FROM posts WHERE id = :id');
    $this->db->bind(':id',$id);
    return $this->db->single();
  }

  public function addPost($data)
  {
    $this->db->query('INSERT INTO posts (title,body,user_id) VALUES (:title,:body,:user_id)');
    $this->db->bind(':user_id',$_SESSION['user_id']);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':body',$data['body']);
    return $this->db->execute();
  }
}