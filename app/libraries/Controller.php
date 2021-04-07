<?php

class Controller
{
  //Load model
  public function model($model)
  {
    if(file_exists('../app/models/'.$model.'.php'))
    {
      //Require model file
      require_once '../app/models/'.$model.'.php'; 
      //Initialize new model
      return new $model;
    }else{
      //TODO Throw exception ? 
      die('model does not exist');
    }
  }

  //Load view
  public function view($view, $data=[])
  {
    if(file_exists('../app/views/'.$view.'.php'))
    {
      require_once '../app/views/'.$view.'.php';
    }else{
      //TODO Throw exception ?
      die('view does not exist');
    }
  }
}