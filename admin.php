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
       	  <div id="header"> <div class="header_content_mainline"> Админка </div> <div id="header_content_tagline">Почувствуй себя богом  </div>
          

</div>
</div>
</div>
<div class = 'content'>
  <?php
    $sql1 = mysqli_query($db, "SELECT * FROM `users` WHERE login = '{$_SESSION['login']}'");
  if(mysqli_fetch_array($sql1)['roots'] == 2){
    $admin = 1;
  } else {
    $admin = 0;
  }

    if($admin == 0){
      exit('Нет прав');
    }
  ?>
  <div><a href = "?page=отзывы">Отзывы</a> <a href = '?page=ошибки'>Ошибки</a> <a href = '?page=страницы'>Страницы</a> <a href = '?page=пользователи'>Пользователи</a></div>

  <?php
    if($_GET['deleteusr']){
      mysqli_query($db, "DELETE FROM`users` WHERE `id` = {$_GET['deleteusr']}");
    }
    if($_GET['deletestr']){
      mysqli_query($db, "DELETE FROM`users` WHERE `id` = {$_GET['deletestr']}");
      mysqli_query($db, "DELETE FROM`comments` WHERE `itemid` = {$_GET['deletestr']}");
    }
    if($_GET['giveroots']){
      $sql = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = {$_GET['giveroots']}");
      $user = mysqli_fetch_array($sql);
      if($user['roots'] == 0){
        mysqli_query($db, "UPDATE `users` SET `roots` = 1 WHERE `id` = {$_GET['giveroots']}");

      }
      if($user['roots'] == 1){
        mysqli_query($db, "UPDATE `users` SET `roots` = 0 WHERE `id` = {$_GET['giveroots']}");
      }
    }


    $page = $_GET['page'];
    if($page == 'отзывы'){
      $sql = mysqli_query($db, "SELECT * FROM `otziv`");

        echo ('<table border = "1"><tr><td>Пользователь</td><td>Отзыв</td><td>Оценка</td></tr>');
      while($result = mysqli_fetch_array($sql)){
        echo("<tr><td>{$result['login']}</td><td>{$result['otziv']}</td><td>{$result['ocenka']}</td></tr>");
      }
      echo('</table>');
    }
    if($page == 'ошибки'){
      $sql = mysqli_query($db, "SELECT * FROM `comment`");

        echo ('<table border = "1"><tr><td>Пользователь</td><td>Название файла</td><td>Предмет</td><td>Ошибка</td></tr>');
      while($result = mysqli_fetch_array($sql)){
        echo("<tr><td>{$result['login']}</td><td>{$result['name']}</td><td>{$result['predmet']}</td><td>{$result['mistake']}</td></tr>");
      }
      echo('</table>');
    }
    if($page == 'страницы'){
      $sql = mysqli_query($db, "SELECT * FROM `files`");

        echo ('<table border = "1"><tr><td>id</td><td>Автор</td><td>Название</td><td></td></tr>');
      while($result = mysqli_fetch_array($sql)){
        echo("<tr><td>{$result['id']}</td><td>{$result['author']}</td><td><a href = 'item.php?id={$result['id']}'>{$result['name']}</a></td><td><a href = '?page=страницы&deletestr={$result['id']}'>Удалить</a></td></tr>");
      }
      echo('</table>');
    }

    if($page == 'пользователи'){
      $sql = mysqli_query($db, "SELECT * FROM `users`");

        echo ('<table border = "1"><tr><td>id</td><td>Логин</td><td>Имя</td><td>email</td><td>Права</td><td></td></tr>');
      while($result = mysqli_fetch_array($sql)){
        echo("<tr><td>{$result['id']}</td><td>{$result['login']}</td><td>{$result['name']}</td><td>{$result['email']}</td><td><a href = '?page={$_GET['page']}&giveroots={$result['id']}'>{$result['roots']}</a></td><td><a href = '?page=пользователи&deleteusr={$result['id']}'>Удалить</a></td></tr>");
      }
      echo('</table>');
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