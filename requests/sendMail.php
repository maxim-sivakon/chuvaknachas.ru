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

    // Формирование сообщения
    $subject = "Новое сообщение с формы";
    $message = "Имя: $name\nНомер телефона: $phone\nПочта: $email";
    $headers = "From: $email\r\n";

    // Отправка письма
    if (mail("sales@chuvaknachas.ru", $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Неверный метод запроса.";
}
?>