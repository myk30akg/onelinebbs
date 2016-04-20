<?php
//データベースに接続
      require('dbconnect.php');

  //POST送信が行われたら、下記の処理を実行
  //テストコメント
  //issetはPOST送信したかどうかの確認
  if(isset($_POST) && !empty($_POST)){
    //「!」は否定

    
    //SQL文作成(INSERT文)
      // $sql='INSERT INTO posts (id,nickname,comment,created) VALUES("'.$id.'","'.$nickname.'","'.$comment'","'.$created.'")';
      
      //$sql=INSERT INTO `posts`(`id`,`nickname`,`commment`,`created`)''
      //$sql.='VALUES(null,\'.$_POST['nickname'].'\',\'.$_POST[comment'].'\',now())';
      //↑分けるならこれでもオーケー！「.=」は続き。

      $sql=sprintf('INSERT INTO `post`(`nickname`,`comment`,`created`) VALUES(\'%s\',\'%s\',now())',$_POST['nickname'],$_POST['comment']);

    //INSERT文実行
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
    
  }

  //SQL文作成(SELECT文)
    $sql='SELECT*FROM `posts`'; 
  //SELECT文実行
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

  //格納する変数の初期化
      $posts=array();

      while(1){
        //実行結果として得られたデータを取得
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

        if($rec==false){
          break;
        }
        //取得したデータを配列に格納しておく(配列の追加)
        $posts[]=$rec;

      }


  //データベースから切断
      $dbh=null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>

</head>
<body>
<!-- <form action="bbs.php" method="post"> -->
    <form method="post">
      <input type="text" name="nickname" placeholder="nickname" required>
      <textarea type="text" name="comment" placeholder="comment" required></textarea>
      <button type="submit" >つぶやく</button>
    </form>

    <?php
    //指定した配列のデータ数分繰り返しを行う
    foreach($posts as $post_each){
      echo '<h2><a href="#">'.$post_each['nickname'].'</a><span>'.$post_each['created'].'</span></h2>';
      echo '<p>'.$post_each['comment'].'</p>';

    }

    ?>
    <h2><a href="#">nickname Eriko</a> <span>2015-12-02 10:10:20</span></h2>
    <p>つぶやきコメント</p>

    <h2><a href="#">nickname Eriko</a> <span>2015-12-02 10:10:10</span></h2>
    <p>つぶやきコメント2</p>
</body>
</html>



