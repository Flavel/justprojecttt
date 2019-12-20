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
		<div class="nav_button"><a href="index00.php">Оставить отзыв </a> </div>
		<div class="nav_button"><a href="index00.php">Нашел ошибку? </a> </div>
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
       	  <div id="header"> <div class="header_content_mainline"> Добро пожаловать на страницу регистрации. </div> <div id="header_content_tagline">Давай-ка ты пройдешь проверочку.  </div>
          
          
</div>
           
                 <div id="header_lower">  <div id="header_content_boxline">Вход<div id="header_content_boxcontent">

 <form action="testreg.php" method="post">
    <p><?php echo $_SESSION['warning']; $_SESSION['warning'] = NULL; ?></p>
    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
 <p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
    <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
    <p>
    <input type="submit" name="submit" value="Войти">
    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
<br>
    </p></form>
 </div></div> 
          </div><div id="header_lower">  
            <div id="header_content_boxline">Регистрация</div> 
          <div id="header_content_boxcontent"> <form action="save_user.php" method="post">
            <p><?php echo $_SESSION['warning1']; $_SESSION['warning1'] = NULL; ?></p>
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <label>Ваше ФИО:<br></label>
    <input name="name" type="text" size="30" maxlength="100">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
<p>
    <label>Ваш email:<br></label>
    <input name="email" type="text" size="30" maxlength="30">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
	<p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 

<p>
    <input type="submit" name="submit" value="Зарегистрироваться">
	
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
</p></form></div>
          
          </div>     
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
На экзамене студент берёт один билет — не знает. Берёт другой — тоже.

Третий — та же беда… Так четвёртый, пятый… Профессор берёт зачётку, ставит ему "3″. Другие студенты возмущаются:

— За что?

— Как за что… — отвечает препод, — если что-то ищет, значит, что-то знает…	</div> 
          </div>


</div> 
</div>


</body>
</html>
