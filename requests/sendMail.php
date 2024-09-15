<?php
$response = [];


    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars(trim($_POST['first-name']));
            $phone = htmlspecialchars(trim($_POST['phone-user']));
            $email = htmlspecialchars(trim($_POST['email-user']));
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Что-то пошло не так. Попробуйте еще раз.';
            echo json_encode($response);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['status'] = 'error';
            $response['message'] = 'Некорректный адрес электронной почты.';
            echo json_encode($response);
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
  
  <b>Время с сервера (Asia/Almaty): '.date('d.m.Y H:m:s').'</b>
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
        $response['status'] = 'success';
        $response['message'] = $name.", заявка успешно отправлена.";
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }


echo json_encode($response); // Отправляем ответ в формате JSON

?>