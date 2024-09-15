<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы и очищаем их
    $name = htmlspecialchars(trim($_POST['first-name']));
    $phone = htmlspecialchars(trim($_POST['phone-user']));
    $email = htmlspecialchars(trim($_POST['email-user']));

    // Проверка на корректность email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный адрес электронной почты.";
        exit;
    }

    $to  = 'sales@chuvaknachas.ru';

    // тема письма
    $subject = 'Новая заявка с сайта chuvaknachas.ru';

    // текст письма
    $message = '
<html>
<head>
  <title>Новая заявка с сайта chuvaknachas.ru</title>
</head>
<body>
  <p>Новая заявка с сайта chuvaknachas.ru</p>
  <table>
    <tr>
      <th>Имя</th><th>Почта</th><th>Телефон</th>
    </tr>
    <tr>
      <td>'.$name.'</td><td>'.$email.'</td><td>'.$phone.'</td>
    </tr>
  </table>
</body>
</html>
';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: chuvaknachas <sales@chuvaknachas.ru>' . "\r\n";
    $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
    $headers .= 'Cc: sales@chuvaknachas.ru' . "\r\n";
    $headers .= 'Bcc: sales@chuvaknachas.ru' . "\r\n";







    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Неверный метод запроса.";
}
?>