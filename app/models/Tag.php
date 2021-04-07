<?php

class Tag extends Model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Database queries

  public function getAllTags()
  {
    $this->db->query('SELECT * FROM tags');
    return $this->db->resultSet();
  }

  public function getTagIdByName($tag)
  {
    $this->db->query('SELECT id FROM tags WHERE tag = :tag');
    $this->db->bind(':tag',$tag);
    return $this->db->single();
  }

  public function getPostTags($postId)
  {
    $this->db->query('SELECT tag_id FROM post_tag WHERE post_id = :post_id');
    $this->db->bind(':post_id',$postId);
    $result = $this->db->resultSet();

    //Convert Id's to names
    $tagNames=[];
    $this->db->query('SELECT tag FROM tags WHERE id = :id');
    foreach($result as $tag)
    {
      $this->db->bind(':id',$tag->tag_id);
      array_push($tagNames,$this->db->single()->tag);
    }
    return $tagNames;
  }
}