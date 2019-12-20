<?php
session_start();
    ob_start();
    

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	 if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
	  if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password) or empty($email) or empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    echo ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!<a href='index2.php'>Вернуться назад</a>");
    $_SESSION['warning1'] = "Вы ввели не всю информацию!";

    header('Location: '. 'index2.php');
    
    exit();
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $name = htmlspecialchars($name);
	 $email = stripslashes($email);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
	    $email = trim($email);
		$name = trim($name);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    echo ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<a href='index2.php'>Вернуться назад</a>");
    $_SESSION['warning1'] = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    header('Location: '. 'index2.php');
    ob_end_flush();
    exit();
    }
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db, "INSERT INTO users (login,password,name,email) VALUES('$login','$password','$name','$email')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index0.php'>Главная страница</a>";
    $_SESSION['warning1'] = "";
    header('Location: '. 'index0.php');
    ob_end_flush();
    exit();
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    exit();
    ?>