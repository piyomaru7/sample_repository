<?php 
require_once(ROOT_PATH . 'Models/Contact.php');


Class ContactController 
{

  // エスケープ
  function h($s){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }

  // ContactクラスのgetAllContactsを呼び出してテーブル一覧取得
  function index(){
    $contact = new Contact();
    $contactsData = $contact->getAllContacts();
    return $contactsData;
  }

  // ContactクラスのeditInsertを引数でidを渡して呼び出し特定のレコードを取得
  function edit(){
    $id = $_GET['id'];
    $contact = new Contact();
    $contactsData = $contact->editInsert($id);
    return $contactsData;
  }

  function delete(){
    $id = $_GET['id'];
    $contact = new Contact();
    $contactsData = $contact->postDelete($id);
    return $contactsData;
  }
  
  // 新規投稿時のバリデーション
  function insertValidate() {
    // var_dump($_POST);
    // exit;
    if (isset($_POST['submit'])) {
      
      $_SESSION['name'] = $this->h($_POST['name']);
      $_SESSION['kana'] = $this->h($_POST['kana']);
      $_SESSION['tel'] = $this->h($_POST['tel']);
      $_SESSION['email'] = $this->h($_POST['email']);
      $_SESSION['body'] = $this->h($_POST['body']);

      $errors = [];
    
    
      if (empty($_SESSION['name'])) {
        $errors['name'] = '名前を入力してください';
      }
      
      if(strlen($_SESSION['name']) > 10){
        $errors['name'] = '名前は10文字以下にしてください';
      }
    
      if (empty($_SESSION['kana'])) {
        $errors['kana'] = 'フリガナを入力してください';
      }
      
      if(strlen($_SESSION['kana']) > 10){
        $errors['kana'] = 'フリガナは10文字以下にしてください';
      }
    
      if (!preg_match("/[0-9]/", $_SESSION['tel'])) {
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

    if(isset($errors)){
      return $errors;
    }
  }

  // 投稿編集時のバリデーション
  function editValidate() {  
    
    if (isset($_POST['edit'])) {
      //var_dump($_POST);編集後の値確認
      session_start();//セッションの上書き確認

      $_SESSION['id'] = $_POST['id'];
      $_SESSION['name'] = $this->h($_POST['name']);
      $_SESSION['kana'] = $this->h($_POST['kana']);
      $_SESSION['tel'] = $this->h($_POST['tel']);
      $_SESSION['email'] = $this->h($_POST['email']);
      $_SESSION['body'] = $this->h($_POST['body']);

      //var_dump($_SESSION);セッションへの引き継ぎ確認
    
      $errors = [];
    
    
      if (empty($_SESSION['name'])) {
        $errors['name'] = '名前を入力してください';
      }
      
      if(strlen($_SESSION['name']) > 10){
        $errors['name'] = '名前は10文字以下にしてください';
      }
    
      if (empty($_SESSION['kana'])) {
        $errors['kana'] = 'フリガナを入力してください';
      }
      
      if(strlen($_SESSION['kana']) > 10){
        $errors['kana'] = 'フリガナは10文字以下にしてください';
      }
    
      if (!preg_match("/[0-9]/", $_SESSION['tel'])) {
        $errors['tel'] = '数字を入力してください';
      }
    
      if (empty($_SESSION['email'])) {
        $errors['email'] = 'Eメールアドレスを入力してください';
      }
    
      if (empty($_SESSION['body'])) {
        $errors['body'] = 'お問い合わせ内容を入力してください';
      }
    
      if (count($errors) === 0) {      
        header("Location: /editConfirm.php");
      }

    }

    if(isset($errors)){
      return $errors;
    }
  }
  
  function getInsert() {
    $contact = new Contact();
    return $contact->insert($_SESSION);
  }

  function getUpdate() {
    $contact = new Contact();
    return $contact->update($_SESSION);
  }

  function getPostDelete($id) {
    $contact = new Contact();
    return $contact->postDelete($id);
  }

}
