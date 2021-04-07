<?php

class Posts extends Controller
{
  protected $postModel;
  protected $userModel;
  protected $tagModel;

  public function __construct()
  {
    //Initialize Models
    $this->postModel = $this->model('Post');
    $this->tagModel = $this->model('Tag'); 
    $this->userModel = $this->model('User'); 
  }

  public function index()
  {
    $posts = $this->postModel->findAllPosts();
    $authors = [];
    $tags=[];
    foreach($posts as $post)
    {
      array_push($authors,$this->userModel->getUserNameById($post->user_id)->username);
      array_push($tags,$this->tagModel->getPostTags($post->id));
    }
    $data = [
      'posts' => $posts,
      'authors' => $authors,
      'tags' => $tags
    ];

    return $this->view('/posts/index', $data);
  }

  public function show($id)
  {
    $data = [
      'post' => $this->postModel->findPostById($id),
      'tags' => $this->tagModel->getPostTags($id)
    ];
    return $this->view('/posts/show', $data);
  }

  public function create($errors = [])
  {
    $tags = $this->tagModel->getAllTags();
    $data = [
      'errors'=>$errors,
      'tags'=>$tags
    ];
    return $this->view('/posts/create', $data);
  }

  public function edit($id)
  {
    $data = [
      'post' => $this->postModel->findPostById($id),
      'tags' => $this->tagModel->getPostTags($id)
    ];
    return $this->view('/posts/edit', $data);
  }

  public function store()
  {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'tags' => $_POST['tags'],
      'title' => trim($_POST['title']),
      'titleError' => '',
      'body' => trim($_POST['body']),
      'bodyError' => '',
    ];

    //Get tags Id's
    if(!empty($data['tags']))
    {
      $tagsArray = [];
      foreach($data['tags'] as $tag)
      {
        array_push($tagsArray,$this->tagModel->getTagIdByName($tag)->id);
      }
      $data['tags'] = $tagsArray;
    }

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
        exit();
      }else{
        die('addPost return false');
      }
    }

    header('location: '. URLROOT . '/posts/create');
    exit();
  }
}