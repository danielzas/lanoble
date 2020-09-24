<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

enviarMail();

function enviarMail()
{
    if(isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['mensaje']) && isset($_POST['asunto']) && isset($_POST['mail']))
    {
        $name=$_POST['nombre'];
        $email=$_POST['mail'];
        $comment=$_POST['mensaje'];
        $tel=$_POST['telefono'];
        $asunto=$_POST['asunto'];

       /*  $name='daniel';
        $email='lkasjdf@lksdf.com';
        $comment='lkjsdlf';
        $tel=234234;
        $asunto='asddf'; */


        $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug =2 ;           //SMTP::DEBUG_SERVER        // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'daniel.esteban.aguero@gmail.com';                     // SMTP username
                $mail->Password   = 'MLTD111L';                               // SMTP password
                $mail->SMTPSecure = 'tls';   //'tls'      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('daniel.esteban.aguero@gmail.com', 'Mailer');
                $mail->addAddress('daniel.esteban.aguero@outlook.com', 'Mailer');     // Add a recipient
               // $mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Correo de contacto';
                $mail->Body    = 'Nombre:'. $name .'<br>Asunto:'.$asunto.'<br>Telefono:'.$tel.'<br>Correo:'. $email . '<br>Comentario:' . $comment;
               //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                header("Location: exito.html");

                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }else{
        echo "Por favor complete correctamente el formulario".'<a href="contacto.html">Retroceder</a>';
    }
}

?>