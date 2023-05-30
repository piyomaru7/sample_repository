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
        $stmt->execute();
        $dbh->commit();
        header('Location: complete.php');
      } catch (PDOException $e) {
        $dbh->rollback();
        exit();
      }
    } 
  }

  function update($contact) {
    $sql = 'UPDATE contacts SET
              name = :name, kana = :kana, tel = :tel, email = :email, body = :body
            WHERE 
              id = :id';
    
    
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
        $stmt->bindValue(':id', $contact['id'], PDO::PARAM_INT);
        $stmt->execute();
        $dbh->commit();
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

  function editInsert($id) {
    $dbh = dbConnect();
    $stmt = $dbh->prepare('SELECT * FROM contacts WHERE id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}

