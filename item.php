<?php 
session_start();
include("bd.php");  
$id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Бауманка.ру</title>
<link href="css/stylesheet4.css?o1sdsdsd23i1hjhjhjkjkhdddddpo3" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top_bar_black"> <div id="logo_container"> <div id="logo_image">   <img src="images/logo.png">	</div>  
        <div id="nav_block"> 
       <div class="nav_button"><a href="index0.php">Главная  </a></div>
	    <div class="nav_button"><a href="index6.php">Ботва </a> </div>
		<div class="nav_button"><a href="index4.php">Оставить отзыв </a> </div>
		<div class="nav_button"><a href="index5.php">Нашел ошибку? </a> </div>
    <?php 
      if ($_SESSION['login'] != NULL) { 
        echo "<br><div class='nav_button'>{$_SESSION['login']} <a href='index0.php?exit=1'>Выход </a> </div>";
      } else {
        echo "<br><div class='nav_button'><a href='index2.php'>Авторизация </a> </div>";
      }
      ?>
      <?php
      $sql = mysqli_query($db, "SELECT * FROM `users` WHERE login = '{$_SESSION['login']}'");
      if(mysqli_fetch_array($sql)['roots'] == 2){
        echo "<div class='nav_button'><a href='admin.php'>Админка </a> </div>";
      }
      ?>
		</div>
</div> </div>
        <div id="content_container1">
       	  <div id="header"> <div class="header_content_mainline"> Ботва </div> <div id="header_content_tagline">Только благодаря этому ты еще бауманец.  </div>
          

</div>
</div>
</div>
<div class = 'content'>
<?php
  $sql = mysqli_query($db, "SELECT * FROM `files` WHERE `id` = {$id}");
  while($result = mysqli_fetch_array($sql)){
    $sql1 = mysqli_query($db, "SELECT * FROM `users` WHERE login = '{$_SESSION['login']}'");
  if(mysqli_fetch_array($sql1)['roots'] == 2){
    $admin = 1;
  } else {
    $admin = 0;
  }

    if($admin == 1){
      echo "<div  class = 'item'><span><object><embed src='fales/" . $result['id'] . ".pdf' width='400' height='300' /> </object></span><h2>{$result['name']}</h2><h3>Автор: {$result['author']} <a href = 'index6.php?delete={$result['id']}'>Удалить</a></h3><a href = 'item.php?id={$result['id']}'>Больше</a></div>";
    } else {
    echo "<div  class = 'item'><span><object><embed src='fales/" . $result['id'] . ".pdf' width='400' height='300' /> </object></span><h2>{$result['name']}</h2><h3>Автор: {$result['author']}</h3><a href = 'item.php?id={$result['id']}'>Больше</a></div>";
    }
  }
?> 
<h2>Комментарии</h2 > 
<?php

  $sql = mysqli_query($db, "SELECT * FROM `users` WHERE login = '{$_SESSION['login']}'");
  if(mysqli_fetch_array($sql)['roots'] > 0){
    $moder = 1;
  } else {
    $moder = 0;
  }

  if(!$_SESSION['id']){
    echo 'Если хочешь оставить коммент, тебе придется авторизоваться. Можешь нажать <a href = "index2.php">сюда</a> или нажать на кнопку наверху.';
  } else {
    echo '<form action = "?id=' . $id . '" method = "POST"> <textarea name = "text" placeholder = "Комментарий..."></textarea><br><input type = "submit" name = "submit" value = "Отправить"></form>';
  }

  if(($_POST['submit']) && ($_POST['text'] != "")){
    mysqli_query($db, "INSERT INTO `comments` (`login`, `itemid`, `text`) VALUES ('{$_SESSION['login']}',{$id},'{$_POST['text']}')");
    
  }
?>
<?  
  

  $sql = mysqli_query($db, "SELECT * FROM `comments` WHERE `itemid` = {$id} ORDER BY `id` DESC");
  while($result = mysqli_fetch_array($sql)){
    if($moder == 1){
    echo "<div class = 'comment'><p> {$result['login']}[{$result['date']}] <a href = '?id={$_GET['id']}&delete={$result['id']}'>Удалить комментирий</a></p>{$result['text']}</div>";
  } else {
    echo "<div class = 'comment'><p> {$result['login']}[{$result['date']}]</p>{$result['text']}</div>";
  }
  }
?>

    </div>    
        
<div id="bottom_bar_black"> <div id="main_container">
	<div id="header_lower">  <div id="header_content_lowerline">Контакты
	    <div id="header_content_lowerboxcontent">2-я Бауманская ул. 5<br />
	      Москва<br />
	      Россия<br />
        105005<BR />
        abiturient@bmstu.ru<br />
      www.bmstu.ru<br />
        +7(499)263-6541<BR /> 
        </div>
	</div> 
          </div>
          
          <div id="header_lower">  <div id="header_content_lowerline">Поговорки
            <div id="header_content_lowerboxcontent">
Студент спрашивает у преподавателя:

— Скажите, я получу за семестр «автомат»?

Препод:

— Да! И сапоги в придачу!	</div> 
          </div>


</div> 
</div>


</body>
</html>