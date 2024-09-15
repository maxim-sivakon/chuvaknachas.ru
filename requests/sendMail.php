<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['first-name']));
    $phone = htmlspecialchars(trim($_POST['phone-user']));
    $email = htmlspecialchars(trim($_POST['email-user']));

    try {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
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
  
  <b>Время с сервера (Asia/Almaty): '.date('m.d.Y h:i:s a', time()).'</b>
</body>
</html>
';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'To: chuvaknachas <sales@chuvaknachas.ru>' . "\r\n";
        $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
        $headers .= 'Cc: sales@chuvaknachas.ru' . "\r\n";
        $headers .= 'Bcc: sales@chuvaknachas.ru' . "\r\n";
        mail($to, $subject, $message, $headers);
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Неверный метод запроса.';
}

echo json_encode($response); // Отправляем ответ в формате JSON

?>