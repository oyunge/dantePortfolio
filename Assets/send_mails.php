<?php
if (isset($_POST['mycontact_form'])) {
    require('phpmailer/PHPMailerAutoload.php');
    # code...
    $subject = "You have received an Email Through Official Website";
    $from = $_POST['Name'];
    $mobile_no = $_POST['tel'];
    $sender_email = $_POST['email'];
    $message = $_POST['message'];
    $full_message = " You have received and email from: {$from} with the details: 
    <br>
    Email : {$sender_email} 
    Phone Number : {$mobile_no} 
    With the message: <br>
    {$message}";
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "sandandevelopers@gmail.com";
    $mail->Password = "sandandevelopers047";
    $mail->SetFrom("sandandevelopers","SANDAN DEVELOPERS");
    $mail->Subject = "$subject";
    $mail->Body = "$full_message";
    $mail->AltBody = strip_tags($full_message);
    $mail->addAddress("sandandevelopers@gmail.com", 'You');
    if(!$mail->send()) {
        return 0;
    } else {
        return 1;
    }
}