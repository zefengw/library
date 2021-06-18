<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    if(isset($_POST['create_user']) || isset($_POST['add_book'])){
        $username = $_POST['user_name'];
        $user_email = $_POST['user_email'];

        $mail = new PHPMailer();
        $mail->IsSMTP();

        // $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "zefengwang613@gmail.com";
        $mail->Password   = "R7BJGUEQ";

        $mail->IsHTML(true);
        $mail->AddAddress($user_email, $username);
        $mail->SetFrom("zefengwang613@gmail.com", "Zefeng Wang");
        $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
        $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

        $mail->MsgHTML($content);
        if(!$mail->Send()) {
          echo "Error while sending Email.";
          var_dump($mail);
        } else {
          echo "Email sent successfully";
        }
    }
?>