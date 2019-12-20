<?php 
session_start();
include("bd.php");  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Бауманка.ру</title>
<link href="css/stylesheet4.css?o1sdfsdfs23i1po3222" rel="stylesheet" type="text/css" />
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
       	  <div id="header"> <div class="header_content_mainline"> Поиск </div> <div id="header_content_tagline"></div>
          <div id = 'header_lower'><form action = "" method = "GET"><input type = 'text' placeholder="Поиск"  name = 'request'></div>
          <div id = 'header_lower'><a href = "add.php">Добавить материал</a></div> 

</div>
</div>
</div>
<div class = 'content'>
<?php


  $sql = mysqli_query($db, "SELECT * FROM `users` WHERE login = '{$_SESSION['login']}'");
  if(mysqli_fetch_array($sql)['roots'] == 2){
    $admin = 1;
  } else {
    $admin = 0;
  }

  if(($_GET['delete']) && ($admin == 1)){
    mysqli_query($db, "DELETE FROM `files` WHERE `id` = '{$_GET['delete']}'");
    mysqli_query($db, "DELETE FROM `comments` WHERE `itemid` = '{$_GET['delete']}'");
  }



  $sql = mysqli_query($db, "SELECT * FROM `files` WHERE name LIKE '%{$_GET['request']}%' OR description LIKE '%{$_GET['request']}%' OR item LIKE '%{$_GET['request']}%'");
  while($result = mysqli_fetch_array($sql)){
    if($admin == 1){
      echo "<div  class = 'item'><span><object><embed src='fales/" . $result['id'] . ".pdf' width='400' height='300' /> </object></span><h2>{$result['name']}</h2><h3>Автор: {$result['author']} <a href = '?delete={$result['id']}&request={$_GET['request']}'>Удалить</a></h3><a href = 'item.php?id={$result['id']}'>Больше</a></div>";
    } else {
    echo "<div  class = 'item'><span><object><embed src='fales/" . $result['id'] . ".pdf' width='400' height='300' /> </object></span><h2>{$result['name']}</h2><h3>Автор: {$result['author']}</h3><a href = 'item.php?id={$result['id']}'>Больше</a></div>";
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