<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ContactController.php');
$contact = new ContactController();
$contactsData = $contact->index();
$validate = $contact->createValidate();//ここで$_SESSIONに格納している

if(isset($_POST['edit'])){
  session_destroy();
  header("Location: edit.php?id=" . $_POST['id']);
}
?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
</head>

<body>
<div class="main">
  <div class="container-fruid" >
      <?php include("header.php") ?>
      
      <div class="contact_main">

        <p>入力画面</p>

        <?php if(isset($validate)){ ?>
          <?php if(isset($validate['name'])) {echo $validate['name'];} ?><br>
          <?php if(isset($validate['kana'])) {echo $validate['kana'];} ?><br>
          <?php if(isset($validate['tel'])) {echo $validate['tel'];} ?><br>
          <?php if(isset($validate['email'])) {echo $validate['email'];} ?><br>
          <?php if(isset($validate['body'])) {echo $validate['body'];} ?><br>
        <?php }?>
        
        <div class="form">
          <form class="contact_form" action='./contact.php' method='post' onsubmit="return validateForm()" >
            <div class="input_text">
              <label>氏名<br>
              <p id="message1"></p>
                <input id="input1" type="text" name="name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>" />
              </label>
            </div>
            <div class="input_text">
              <label>フリガナ<br>
              <p id="message2"></p>
                <input id="input2" type="text" name="kana" value="<?php if(isset($_SESSION['kana'])){echo $_SESSION['kana'];}?>"/>
              </label>
            </div>
            <div class="input_text">
              <label>電話番号<br>
              <p id="message3"></p>
                <input id="input3"type="tel" name="tel" value="<?php if(isset($_SESSION['tel'])){echo $_SESSION['tel'];}?>"/>
              </label>
            </div>
            <div class="input_text">
              <label>メールアドレス<br>
              <p></p>
                <input id="input4" type="email" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>"/>
              </label>
            </div>
            <div class="input_text">
              <label>お問い合わせ内容<br>
              <p></p>
                <textarea id="input5" name="body" ><?php if(isset($_SESSION['body'])){echo $_SESSION['body'];}?></textarea>
              </label>
            </div>
            <input type="submit" name="submit" value="確認" class="submit_btn">
          </form>
        </div>

        <table>
          <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>お問い合わせ内容</th>
          </tr>
          <?php foreach ($contactsData as $column) : ?>
            <tr>
              <td><?php echo $column['name'] ?></td>
              <td><?php echo $column['kana'] ?></td>
              <td><?php echo $column['tel'] ?></td>
              <td><?php echo $column['email'] ?></td>
              <td><?php echo nl2br($column['body']) ?></td>
              <form action="./contact.php" method="post">
                <input type="hidden" name="id" value="<?php echo $column['id']?>">
              <!-- <td><a href="/edit.php?id=<?php //echo $column['id'] ?>">編集</a></td> -->
              <td><input type="submit" name="edit" value="編集"></td>
              </form>
              <!-- <td><a href="/deleteConfirm.php?id=<?php //echo $column['id'] ?>">削除</a></td> -->
              <td><a href="/deleteConfirm.php?id=<?php echo $column['id'] ?>">削除</a></td>
              
            </tr>
          <?php endforeach; ?>
        </table>
      </div>

      
      <div class="row restaurants scroll-block fade-block1">
          <div class="col-md-12 col-xs-12">
              <h3 class="index_level3" style="text-align:center;">店舗一覧</h3>
              <div class="address-boxes">
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant2.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>東京都渋谷区xxxxxx xxxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant3.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>千葉県松戸市xxxxx xxxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant4.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>神奈川県横浜市xxxxx xxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant5.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>埼玉県川越市xxxxx xxxx</p>
                  </div>
              </div>
          </div>
      </div>
      <?php include("footer.php") ?>
  </div>
</div>  


  
</body>

</html>