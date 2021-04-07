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


  // DB queries
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
    //Add new post
    $this->db->query('INSERT INTO posts (title,body,user_id) VALUES (:title,:body,:user_id)');
    $this->db->bind(':user_id',$_SESSION['user_id']);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':body',$data['body']);
    $result = $this->db->execute();

    //Return if there is no tags or execute return false
    if(empty($data['tags']) || !$result)
    {
      return $result;
    }

    //Get Id of the new post
    $this->db->query('SELECT id FROM posts WHERE title=:title AND user_id=:user_id');
    $this->db->bind(':user_id',$_SESSION['user_id']);
    $this->db->bind(':title',$data['title']);
    $postId = $this->db->single()->id;

    //Attach tags
    return $this->attachTags($postId,$data['tags']);
  }

  public function attachTags($postId,$tags)
  {
    $this->db->query('INSERT INTO post_tag (post_id,tag_id) VALUES (:post_id,:tag_id)');
    $this->db->bind(':post_id',$postId);
    foreach($tags as $tag)
    {
      $this->db->bind(':tag_id',$tag);
      //If any execution fails return false
      if(!$this->db->execute())
      {
        return false;
      }
    }
    return true;
  }
}