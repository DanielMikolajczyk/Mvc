<?php
session_start();

function setSession($id,$username,$email)
{
  $_SESSION['user_id'] = $id;
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $email;
}