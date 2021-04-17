<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Contacts extends Controller
{
  public function index()
  {
    return $this->view('/contacts/index');
  }

  public function store()
  {
    if(!($_SERVER['REQUEST_METHOD'] == 'POST'))
    {
      //TODO 404 error
      header("HTTP/1.0 404 Not Found");
      exit();
    }
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data = [
      'name' => trim($_POST['name']),
      'email' => trim($_POST['email']),
      'title' => trim($_POST['title']),
      'body' => trim($_POST['body']),
      'nameError' => '',
      'emailError' => '',
      'titileError' => '',
      'bodyError' => '',
    ];

    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
    {
      $data['emailError'] = 'Invalid email adress!';
    }
    if(strlen($data['name'])>64)
    {
      $data['nameError'] = 'Name is too long!';
    }
    if(strlen($data['title'])>64)
    {
      $data['titleError'] = 'Title is too long!';
    }
    if(strlen($data['body'])>1024)
    {
      $data['bodyError'] = 'Too many characters!';
    }
    
    $mail = new PhpMailer(true);
    try {
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'dyskeeeit1@gmail.com';                     //SMTP username
      $mail->Password   = 'piotrdziurdzia1@';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;
      $mail->CharSet = 'UTF-8';

      //Recipients
      $mail->setFrom('dyskeeeit1@gmail.com', 'Kontakt NetBuild');
      #$mail->addAddress('d.mikolajczyk@netbuild.pl', 'Damian');     //Add a recipient
      $mail->addAddress('d.mikolajczyk.20@gmail.com', 'Daniel');     //Add a recipient
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Kontakt NetBuild - Zapytanie od klienta';
      $mail->Body    = 'Otrzymałeś maila od: <b>'.$data['name'].'</b>'.
                       '<br> Tytuł wiadmości: <b>'. $data['title']. '</b>'. 
                       '<br> Treść: <b>'. $data['body'].'</b>'. 
                       '<br> Mail kontaktowy: '. $data['email'];
      $mail->AltBody = 'Twój email nie obsługuje wiadmości HTML.';

      $mail->send();
      header("Location: ".URLROOT."/contacts?success=1");
      exit();
    } catch (Exception $e) {
      echo 'Error. '.$mail->ErrorInfo;
    }    
  }
}