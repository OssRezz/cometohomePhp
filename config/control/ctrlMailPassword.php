<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require '../../vendor/autoload.php';
// Instantiation and passing `true` enables exceptions


function sendMail($correo, $nombre)
{
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = false;                                       // Enable       verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'tv032303@gmail.com';
        $mail->Password   = 'googlepirata';
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('tv032303@gmail.com', 'ComeToHome');
        $mail->addAddress($correo, $nombre);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Actualizacion de passsword - Casa de la Cultura Guarne';
        $mail->Body    = '<h3>Informacion</h3><br><p>Se ha realizado el cambio de password en la pagina web Casa de la Cultura Guarne.</p>';
        $mail->AltBody = 'Informacion: Se ha realizado el cambio de password en la pagina web Casa de la Cultura Guarne.';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "cualquier cosa" . $e;
    }
    return false;
}
