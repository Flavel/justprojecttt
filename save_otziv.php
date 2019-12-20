<?php
session_start();
ob_start();
    if (isset($_POST['otziv'])) { $otziv=$_POST['otziv']; if ($otziv =='') { unset($otziv);} }
	  if (isset($_POST['ocenka'])) { $ocenka=$_POST['ocenka']; if ($ocenka =='') { unset($ocenka);} }
    //заносим введенный пользователем пароль в переменную $sostav, если он пустой, то уничтожаем переменную
 if (empty($otziv) && empty($ocenka))
    {
    $_SESSION['warning'] = 'Хоты бы одно поле должно быть заполнено';
     header('Location: '. 'index4.php');
    ob_end_flush();
    }
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db, "INSERT INTO otziv (login,otziv,ocenka) VALUES('{$_SESSION['login']}','$otziv','$ocenka')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Сохранено! <a href='index4.php'>Продолжить</a>";

    $_SESSION['warning'] = 'Спасибо за ваш отзыв!';
     header('Location: '. 'index4.php');
    ob_end_flush();
    }
 else {
    //echo "INSERT INTO otziv (login,otziv,ocenka) VALUES('{$_SESSION['login']}','$otziv','$ocenka')";
    echo "Ошибка!";
    }
    ?>