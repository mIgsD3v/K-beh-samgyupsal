<?php

require_once("../database/DBController.php");
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new DBController();


$validateSecurityQuery = "SELECT * FROM USER WHERE security_question=? AND security_answer=? AND email=?";

$executeSecurity = $db->con->prepare($validateSecurityQuery);

$executeSecurity->bind_param("sss", $_POST["security_question"], $_POST["security_answer"], $_POST["email"]);

if ($executeSecurity->execute()) {
    $result = $executeSecurity->get_result()->fetch_row();
    if ($result !== null && $result[0]) {
        $name = $_POST["name"];
        $to_email = $_POST["email"];
        $randomtoken = uniqid();

        $updateTokenofUser = "UPDATE USER SET token=? WHERE email=?";
        $executeTokenofUser = $db->con->prepare($updateTokenofUser);
        $executeTokenofUser->bind_param("ss", $randomtoken, $_POST["email"]);

        if ($executeTokenofUser->execute()) {
            // Compose email
            $mail = new PHPMailer(true);

            $mail->setFrom('kbeh.samgyupsal@gmail.com', 'k-beh');
            $mail->addAddress($to_email);
            $mail->Subject = "Change password";
            $mail->Body = 'Hi '. $name .', to change your password please click <a href="http://localhost/k-beh/newpassword.php?token=' . $randomtoken . '">Change password</a>';
            $mail->IsHTML(true);    

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = "kbeh.samgyupsal@gmail.com";
            $mail->Password = "vzvrtldwponeydsp";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            try {
                $mail->send();
                header("location: ../forgotpassword.php?message=Security Details Valid. Check your Email for password recovery.");
            } catch (Exception $e) {
                header("location: ../forgotpassword.php?message1=Invalid Security Details.");
            }
        }
    } else {
        header("location: ../forgotpassword.php?message1=Invalid Security Details.");
    }
}

?>