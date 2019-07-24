<?php

    session_start();

        require('src/Exception.php');
        require('src/OAuth.php');
        require('src/POP3.php');
        require('src/SMTP.php');
        require('src/PHPMailer.php');

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        class Mensagem
        {
            private $email;
            private $assunto;
            private $msg;

            public function __get($name)
            {
                $this->$name;
            }

            public function __set($name, $value)
            {
                $this->$name = $value;
            }



            //Envio de email
            public function sendEmail($email)
            {
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = false;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'seuemail@gmail.com';                 // SMTP username
                    $mail->Password = 'suasenha';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->isHTML(true);

                    //Recipients
                    $mail->setFrom('seuemail@gmail.com', 'Teste envio de email');
                    $mail->addAddress($email);     // Add a recipient

                    /**$mail->addReplyTo('info@example.com', 'Information');
                     * $mail->addCC('cc@example.com');
                     * $mail->addBCC('bcc@example.com');*/

                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $this->assunto;
                    $mail->Body = $this->msg;
                    /**$mail->AltBody = '';*/


                    $mail->send();
                    echo 'Email enviado com sucesso';
                } catch (Exception $e) {
                    echo 'Não foi possivel enviar este email, por favor tente mais tarde', '<br>';
                    echo 'Detalhes do erro: ' . $mail->ErrorInfo;

                }
            }
        }




