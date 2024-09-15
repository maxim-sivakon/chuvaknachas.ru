<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['first-name']));
    $phone = htmlspecialchars(trim($_POST['phone-user']));
    $email = htmlspecialchars(trim($_POST['email-user']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный адрес электронной почты.";
        exit;
    }

    $to  = 'sales@chuvaknachas.ru';

    $subject = 'Новая заявка с сайта chuvaknachas.ru';

    $message = '
<html>
<head>
  <title>Новая заявка с сайта chuvaknachas.ru</title>
</head>
<body>
  <p>Новая заявка с сайта chuvaknachas.ru</p>
  <p>Имя: '.$name.'</p>
  <p>Телефон: '.$email.'</p>
  <p>Почта: '.$phone.'</p>
  
  <b>Время с сервера: '.date("d.m.Y h:m:s", null).'</b>
</body>
</html>
';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: chuvaknachas <sales@chuvaknachas.ru>' . "\r\n";
    $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
    $headers .= 'Cc: sales@chuvaknachas.ru' . "\r\n";
    $headers .= 'Bcc: sales@chuvaknachas.ru' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Неверный метод запроса.";
}
?>