<?php
  session_start();
  include('bd.php');
  if($_GET['exit']){
    $_SESSION['login'] = NULL;
    $_SESSION['id'] = NULL;
  }

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
        echo "<br><div class='nav_button'>{$_SESSION['login']} <a href='index0.php'>Выход </a> </div>";
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
       	  <div id="header"> <div class="header_content_mainline"> Добро пожаловать в мир студентов МГТУ. </div> <div id="header_content_tagline">Тут никому не бывает скучно.  </div>
          
          
</div>
           
                 <div id="header_lower">  <div id="header_content_boxline">О нас<div id="header_content_boxcontent">

Мы-инициативная группа студентов МГТУ им.Баумана.<br> 
Мы учимся на первом курсе, но уже осознаем, что помощи много не бывает. Именно поэтому мы создали это невероятно простой и доступный для всех ресурс. Здесь собираются самые свежие и новые файлы с о всякими плюшками. Мы говорим вам: пользуйтесь! 
И да прибудет с вами халява)<br>
С любовью, неравнодушные студенты.
 </div></div> 
          </div><div id="header_lower">  
            <div id="header_content_boxline">Студентам</div> 
          <div id="header_content_boxcontent">

Многие первокурсники, оторвавшись от дома, особенно если начинают жить в общежитии, как будто немного сходят с ума. Они уже не те, Вова или Леша, естественные, со своей точкой зрения, неповторимым характером. Первокурсники начинают сливаться с массой, при этом наивно думая, что проявляют стойкий нордический характер. Очень много соблазнов. Одни старшие товарищи будут внушать «новобранцу», что учеба – это не главное, главное – «студенческий дух свободы», другие будут утверждать, что тот, кто не пьет и не курит – размазня и хлюпик. И тут первокурсник, под прессом общественного студенческого мнения может сдаться и пойти на поводу толпы. Естественно, что студенческие годы – это не только учебный процесс: изучение учебников, сдача экзаменов и зачетов. И разумеется, простая каждодневная зубрежка не оставит никаких ярких воспоминаний после окончания ВУЗа. Но все должно быть в меру. Конечно, бывают ситуации, что диплом выдают за красивые глаза или глубокий непустой карман, но это скорее исключение. К тому же мало у кого хватит средств всегда платить за положительную оценку на экзамене. Выучить – куда надежней, дешевле и само собой полезнее. Неизвестно ведь, где и когда эти знания Вам пригодятся в жизни.</div>
          
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
— Как прошел экзамен? Срочно сообщи!

— Экзамен прошел на ура, профессора в восторге. Просят повторить осенью.	</div> 
          </div>


</div> 
</div>


</body>
</html>
