<?php


require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$mysqli = new mysqli("localhost", "root", "", "DEJ-24");

if(ISSET($_POST['submit'])){

    $name = $_POST['name'];
    $tele = $_POST['tele'];
    $email = $_POST['mail'];
    $address = $_POST['address'];
    $cmd = $_POST['cmd'];
    
    $stmt = $mysqli->prepare("INSERT INTO client (name, phone ,address , mail) VALUES (?,?, ?, ?)");
    $stmt->bind_param('siss', $name, $tele, $address, $email);
    $stmt->execute();
    $last_id_client = $mysqli->insert_id; 



    $stmt = $mysqli->prepare("INSERT INTO cmd (client_id, plat_id) VALUES (?,?)");
    $stmt->bind_param('ii',$last_id_client,$cmd);
    $stmt->execute();



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = 'tls';                       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('');
    $mail->addAddress('');     // Add a recipient
    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'nouvelle commande';
    $mail->Body    = 'Bonjour chef vous avez une nouvelle commande ! <br> Nom :' .$name. ' <br> telephone :  '.$tele. ' <br> Address : ' .$address. ' <br> Command : ' .$cmd. '<br>  ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$mail->smtpClose();

header('Location: G.php?v=votre commande a ete bien enregister ');      

    
}