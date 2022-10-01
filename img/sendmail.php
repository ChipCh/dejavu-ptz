<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\PHPMailer;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	// Отправитель письма
	$mail->setForm('test-sender@mail.ru', 'Клиент ресторана');
	// Получатель письма 
	$mail->addAddres('aleksandr-3565@mail.ru');
	// Тема письма
	$mail->Subject = 'Обратная связь от клиентов бистро "Дежавю"';

	// Тело письма
	$body = '<h1>Отзыв от клиента бистро "Дежавю"</h1>';

	if (trim(!empty($_POST['name']))) {
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if (trim(!empty($_POST['email']))) {
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
	if (trim(!empty($_POST['message']))) {
		$body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
	}

	$mail->Body = $body;

	// Процесс отправки
	if (!$mail->send()) {
		$message = 'Ошибка отправки сообщения';
	} else {
		$message = 'Сообщение успешно отправлено!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);

?>