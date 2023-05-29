<?php

require_once(ROOT_PATH . 'Models/dbc.php');

class Contact
{
  function insert($contact) {
    $sql = 'INSERT INTO 
              contacts (name, kana, tel, email, body)
              VALUES
              (:name, :kana, :tel, :email, :body)';
    
    $dbh = dbConnect();
    
    if (isset($contact)) {
      $dbh->beginTransaction();
      try {
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $contact['name'], PDO::PARAM_STR);
        $stmt->bindValue(':kana', $contact['kana'], PDO::PARAM_STR);
        $stmt->bindValue(':tel', $contact['tel'], PDO::PARAM_INT);
        $stmt->bindValue(':email', $contact['email'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $contact['body'], PDO::PARAM_STR);
        $dbh->commit();
        $stmt->execute();
        header('Location: complete.php');
      } catch (PDOException $e) {
        $dbh->rollback();
        exit();
      }
    } 
  }
  
  function getAllContacts()
  {
    $dbh = dbConnect();
    $sql = 'SELECT * FROM contacts';
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
  }
}

