<?php 

require_once(ROOT_PATH . 'Models/Contact.php');

Class ContactController 
{
function temp(){
  $contact = new Contact();
  $contactsData = $contact->getAllContacts();
  return $contactsData;
}

function validate() {

  if (isset($_POST['submit'])) {

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['kana'] = $_POST['kana'];
    $_SESSION['tel'] = $_POST['tel'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['body'] = $_POST['body'];
  
  
    $errors = [];
  
  
    if (empty($_SESSION['name'])) {
      $errors['name'] = '名前を入力してください';
    }
  
    if (empty($_SESSION['kana'])) {
      $errors['kana'] = 'フリガナを入力してください';
    }
  
    if (!preg_match("/\d/", $_SESSION['tel'])) {
      $errors['tel'] = '数字を入力してください';
    }
  
    if (empty($_SESSION['email'])) {
      $errors['email'] = 'Eメールアドレスを入力してください';
    }
  
    if (empty($_SESSION['body'])) {
      $errors['body'] = 'お問い合わせ内容を入力してください';
    }
  
    if (count($errors) === 0) {
      header('Location: /confirm.php');
    } 
  }
  

}
}