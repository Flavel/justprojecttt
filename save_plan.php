﻿<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['plan'])) { $plan=$_POST['plan']; if ($plan =='') { unset($plan);} }
    //заносим введенный пользователем пароль в переменную $sostav, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($plan)) //если пользователь не ввел логин или состав, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='index3.php'>Назад</a>");
    }
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db, "INSERT INTO plan (login,plan) VALUES('$login','$plan')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Сохранено! <a href='index3.php'>Продолжить</a>";
    }
 else {
    echo "Ошибка!";
    }
    ?>