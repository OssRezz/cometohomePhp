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
        $mail->Username   = 'cometohomecultura@gmail.com';
        $mail->Password   = '3366CGpeople';
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('cometohomecultura@gmail.com', 'Casa De La Cultura de Guarne');
        $mail->addAddress($correo, $nombre);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'ComeToHome - Casa de la Cultura De Guarne';
        $mail->Body    = '<h2 style="color: blue;">Informacion</h2><br><p>Se ha cambiando la contraseña  de su cuenta. Si no lo has modificado tú, deberías comprobar qué ha sucedido..</p>';
        $mail->AltBody = 'Informacion: Se ha cambiando la contraseña  de su cuenta. Si no lo has modificado tú, deberías comprobar qué ha sucedido..';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "cualquier cosa" . $e;
    }
    return false;
}
