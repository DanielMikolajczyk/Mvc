<?php

class Posts extends Controller
{
  protected $postModel;
  protected $userModel;

  public function __construct()
  {
    //Initialize Model
    $this->postModel = $this->model('Post');
  }

  public function index()
  {
    $this->userModel = $this->model('User'); 
    $posts = $this->postModel->findAllPosts();
    $authors = [];
    foreach($posts as $post)
    {
      array_push($authors,$this->userModel->getUserNameById($post->user_id)->username);
    }
    $data = [
      'posts' => $posts,
      'authors' => $authors
    ];

    return $this->view('/posts/index', $data);
  }

  public function show()
  {
    return $this->view('/posts/show');
  }

  public function create()
  {
    return $this->view('/posts/create');
  }

  public function edit($id)
  {
    $post = $this->postModel->findPostById($id);
    return $this->view('/posts/edit', $post);
  }

  public function store()
  {
    die(var_dump($_POST));
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'title' => trim($_POST['title']),
      'titleError' => '',
      'body' => trim($_POST['body']),
      'bodyError' => '',
    ];

    if(empty($data['title']))
    {
      $data['titleError'] = 'Please enter post title';
    }

    if(empty($data['body']))
    {
      $data['bodyError'] = 'Please enter post body';
    }

    if(empty($data['titleError']) && empty($data['bodyError']))
    {
      if($this->postModel->addPost($data))
      {
        header('location: '. URLROOT . '/posts/index');
      }else{
        die('addPost return false');
      }
        
    }

    return $this->view('/posts/index');
  }
}