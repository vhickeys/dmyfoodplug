<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function welcomeMail($sendingMail, $recepientMail, $recepient)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.dmyfoodplug.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@dmyfoodplug.com';                     //SMTP username
        $mail->Password   = 'support@dmyfoodplug2024';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sendingMail, 'Dmy Foodplug');
        $mail->addAddress($recepientMail, $recepient);     //Add a recipient
        $mail->addAddress($recepientMail);               //Name is optional
        $mail->addReplyTo($sendingMail, 'Dmy Foodplug');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Welcome to Dmy Foodplug";

        // Load the HTML template from a file
        $placeholders = array('[Name]');
        $replacements = array($recepient);

        $message = file_get_contents('email-templates/new-account.html'); // Replace with the path to your HTML template file
        $message = str_replace($placeholders, $replacements, $message); // Replace [Username] with the actual username
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function passwordChangeMail($sendingMail, $recepientMail, $recepient)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.dmyfoodplug.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@dmyfoodplug.com';                     //SMTP username
        $mail->Password   = 'support@dmyfoodplug2024';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sendingMail, 'Dmy Foodplug');
        $mail->addAddress($recepientMail, $recepient);     //Add a recipient
        $mail->addAddress($recepientMail);               //Name is optional
        $mail->addReplyTo($sendingMail, 'Dmy Foodplug');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Password Changed Successfully!";

        // Load the HTML template from a file
        $placeholders = array('[Name]');
        $replacements = array($recepient);

        $message = file_get_contents('email-templates/password-change.html'); // Replace with the path to your HTML template file
        $message = str_replace($placeholders, $replacements, $message); // Replace [Username] with the actual username
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function invoiceMail($sendingMail, $recepientMail, $recepient, $tracking_no, $date, $subtotal, $discount, $shipping, $grand_total, $address, $city, $country, $phone, $office_phone, $office_email, $office_address, $order_items_html, $shipping_location)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.dmyfoodplug.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'support@dmyfoodplug.com';                     //SMTP username
        $mail->Password   = 'support@dmyfoodplug2024';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sendingMail, 'Dmy Foodplug');
        $mail->addAddress($recepientMail, $recepient);     //Add a recipient
        $mail->addAddress($recepientMail);               //Name is optional
        $mail->addReplyTo($sendingMail, 'Dmy Foodplug');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Dmy Foodplug Invoice - Status (Unpaid)";

        // Load the HTML template from a file
        $placeholders = array('[Name]', '[Status]', '[Tracking No]', '[Date]', '[Subtotal]', '[Discount]', '[Shipping]', '[Grand Total]', '[Address]', '[City]', '[Country]', '[Phone]', '[Email]', '[Office Phone]', '[Office Email]', '[Office Address]', '[OrderItems]', '[Shipping Location]');
        $replacements = array($recepient, "Pending Payment", $tracking_no, $date, $subtotal, $discount, $shipping, $grand_total, $address, $city, $country, $phone, $recepientMail, $office_phone, $office_email, $office_address, $order_items_html, $shipping_location);

        $message = file_get_contents('email-templates/invoice.html'); // Replace with the path to your HTML template file
        $message = str_replace($placeholders, $replacements, $message); // Replace [Username] with the actual username
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
