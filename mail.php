<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yourmail@gmail.com';
        $mail->Password ='uasqvtmfbydzyvyo';
        $mail->SMTPSecure ='tls';
        $mail->Port ='587';        
        $mail->setFrom('yourmail@gmail.com');
        $mail->addAddress('kadindje@gmail.com');

        $mail->isHTML('true');
        $mail->Subject = 'Message reçu du contact:'.$name;
        $mail->Body = "Nom: $name <br>Email: $email<br>Message: $message";

        $mail->send();
        $alert = "<div class='alert-success'><span>Message envoyé avec succes! merci pour votre retour.</span></div>" ;

    }catch (Exception$e) {
        $alert = "<div class='alert-error'><span>'.$e->getMessage().'</span></div>" ;

    }


}
?>