<?php

class Contacts extends Controller
{
  public function index()
  {
    return $this->view('/contacts/index');
  }
}