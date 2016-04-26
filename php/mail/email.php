<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

// メール設定
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.lolipop.jp';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'seminarinfo@visional.main.jp';                 // SMTP username
$mail->Password = 'seminarinfo1111';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

// 文字コード
$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";

// 送信元
$mail->setFrom('seminarinfo@visional.main.jp', 'セミナーインフォ');

// 送信先
$mail->addAddress('kiddman777@gmail.com', 'kiddman');
$mail->addAddress('fukui@visional.jp', 'kiddman');


$mail->addReplyTo('seminarinfo@visional.main.jp', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

// メール件名
$mail->Subject = '概要説明';

// メール本文
$mail->Body    = 'HTMLタグも使えます。';


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo '一斉送信メール';
    echo '送信エラー: ' . $mail->ErrorInfo;
} else {
    echo '送信完了';
}

?>