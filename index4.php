<?php
  session_start();
  include('bd.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Бауманка.ру</title>
<link href="css/stylesheet4.css" rel="stylesheet" type="text/css" />
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
        <div id="content_container">
       	  <div id="header"> <div class="header_content_mainline"> Привет, студент! </div> <div id="header_content_tagline">Ну как ты?  </div>
          
          
</div>
           
                 <div id="header_lower">  <div id="header_content_boxline">Отзывы<div id="header_content_boxcontent">

Короч. Если ты доволен нашим ресурсом, то чиркани пару слов в отзыв. Это поможет быть нам лучше.<br><br>
  <img src="images/1.png">	  
 </div></div> 
          </div><div id="header_lower">  
            <div id="header_content_boxline"></div> 
          <div id="header_content_boxcontent"><form action="save_otziv.php" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p><?echo $_SESSION['warning']; $_SESSION['warning'] = NULL;?></p>


<p>
    <label>И что же вы хотите до нас донести?<br></label>
    <input name="otziv" type="text" size="30" maxlength="">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
<p>
    <label>Поставьте, пожалуйста, нам оценку по 5бальной шкале.<br></label>
    <input name="ocenka" type="radio" value = "1"><input name="ocenka" type="radio" value = "2"><input name="ocenka" type="radio" value = "3"><input name="ocenka" type="radio" value = "4"><input name="ocenka" type="radio" value = "5">
    </p>
<p>
    <input type="submit" name="submit" value="Сохранить">
	
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
</p></form>
          </div>     
        </div> </div>
        
        
        
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
Профессор психологии объясняет:

— Лучший способ избавить девушку от депрессии — секс.

Один студент переспрашивает:

— Профессор, а как довести девушку до депрессии?	</div> 
          </div>


</div> 
</div>


</body>
</html>
