<!DOCTYPE html>
<html lang="en">
<head>
  <title>Подписка на мероприятие</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
echo $email 		= $_POST['email'] . "<br />"; // Электронная почта
echo $first_name 	= $_POST['firstname'] . "<br />"; // Имя
echo $last_name 	= $_POST['lastname'] . "<br />"; // Фамилия
echo $country 		= $_POST['country'] . "<br />"; // Страна
echo $company 		= $_POST['company'] . "<br />"; // Компания
echo $rod_deyat     = $_POST['rd'] . "<br />";    		// Род деятельности: rod_deyat
echo $prof      	= $_POST['prof'] . "<br />";    // Должность
echo $address       = $_POST['address'] . "<br />"; // Адрес 1
echo $address2      = $_POST['address2'] . "<br />"; // Адрес 2
echo $city      	= $_POST['city'] . "<br />";    // Город
echo $post_index    = $_POST['post_index'] . "<br />"; // Почтовый индекс
echo $work_phone    = $_POST['work_phone'] . "<br />"; // Рабочий телефон
?>
</body>
</html>
