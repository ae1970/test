<!DOCTYPE html>
<html lang="en">
<head>
  <title>Подписка на мероприятие</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  $first_name = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  echo $first_name . "<br>";
  $last_name = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  echo $last_name . "<br>";
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Проверяем email на валидность!
		if ($email === false) {
		print "Submitted email address is invalid!<br>";
		}
  // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS); доп.проверка не нужна!
  try {

  $pdo->exec("INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')");

  } catch (Exception $e) {
	$error = 'Ошибка!' . $e->getMessage(); 
	exit();
}

  echo 'был добавлен!';

?>

</body>
</html>
