<?php
    require('config.php');


    $email = addslashes($_POST['email']);
    $assunto = addslashes($_POST['assunto']);
    $mensagem = addslashes($_POST['msg']);

    if(!empty($email) && !empty($assunto) && !empty($mensagem)) {
        $msg = new Mensagem();
        $msg->__set('email', $email);
        $msg->__set('assunto', $assunto);
        $msg->__set('msg', $mensagem);

        $msg->sendEmail($email);

        $_SESSION['msg'] = '<p class="text-success">'. 'Enviado com sucesso' .'</p>';
        header('location: index.php');
        return true;

    } else {
        header('location: index.php');
        $_SESSION['msg'] = '<p class="text-danger">'. 'Campo vazio' .'</p>';
        return false;
    }



