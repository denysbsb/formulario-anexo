<?php
include_once 'PHPMailer/class.phpmailer.php';
if( filter_has_var(INPUT_POST, 'enviar') ) {
    
    $arquivo = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $dir = 'upload/';
    
    move_uploaded_file($arquivo, $dir.$name);
    
    $path_file = $dir.$name;
    
    
    $mail = new PHPMailer();
    
    $mail->IsMail(); 
    $mail->AddAddress('email@seudominio.com.br', 'Pedro');
    $mail->IsHTML(true);
    $mail->Subject = "Mensagem Teste";
    $mail->Body = "Mensagem Enviada Com Anexo";
    $mail->AddAttachment($path_file);
    
    if($mail->Send()) {
        echo 'Enviado com Sucesso!';
        }
    
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="enviar" value="Enviar" />
</form> 