<?php namespace Mail;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';


class Mail {
    
    public static function envioNuevaContrasena($correoDestino) {
        try {
            $mail = new PHPMailer();

            $mail->isSMTP();                                 
            $mail->Host       = 'smtp.gmail.com';            
            $mail->SMTPAuth   = true;                          
            $mail->Username   = 'auxiliardaw2@gmail.com';          
            $mail->Password   = 'gaxrwhgytqclfiyd';                      
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
            $mail->Port       = 465;                        
            $nuevaContrasena = self::nuevaContrasena();  
        
            //Emisor
            $mail->setFrom('auxiliardaw2@gmail.com', 'Javier Velasco');
        
            //Destinatarios
            $email_parts = explode('@', $correoDestino);
            $headers="From: {$email_parts[0]}\r\n";
            $mail->addAddress($correoDestino, $headers);    
        

            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);                        
            $mail->Subject = "Hola {$email_parts[0]} esta es su nueva contraseña";          
            $mail->Body    = "Hola {$email_parts[0]} esta es su nueva contraseña {$nuevaContrasena} porfavor no responda este correo";
        
            $mail->send();    
            echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }
    }

    public static function nuevaContrasena(){
        $contrasena = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        return $contrasena;
    }
}
