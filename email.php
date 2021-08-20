<?php
    require_once "vendor/phpmailer/PHPMailer.php";
    require_once "vendor/phpmailer/SMTP.php";
    require_once "vendor/phpmailer/Exception.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
function sendEmail($name, $book, $author){
    global $user_email;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "ssccyouth20@gmail.com";
    $mail->Password = "redbook7456";
    $mail->Subject = "Receipt From SSCC Library";
    $mail->setFrom("ssccyouth20@gmail.com");
    $mail->isHTML(true);
    // $mail->addAttachment("image path")
    $mail->Body = "
      <h2>Sheng Shen Catholic Church Library</h2>
      <h4>
        Hi $name!<br><br>

        You just borrowed the following book(s):<br>
        <ul>
        <li>Book: $book<br>By: $author</li><br>
        </ul>
        Please return this in 1 month, if possible, so that it could be circulated to other customers! <br><br>
        Thank you! <br>
        Sheng Shen Catholic Church Library
        <br><br>
      </h4>

    ";
    $mail->addAddress($user_email);
    $mail->Send();
    $mail->smtpClose();
  }
?>