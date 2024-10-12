<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  // Création d'une nouvelle instance de la classe PHPMailer
  $mail = new PHPMailer(); //.
  $mail->IsSMTP();

  //Configuration des paramètres SMTP :

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "adresse e-mail de l'administrateur du site";
  $mail->Password   = "Le mot de passe";
  
  // Activation du format HTML pour le contenu du courriel
  $mail->IsHTML(true); //.
  $mail->AddAddress($recipient, "Utilisateur Gourmand'Île");
  $mail->SetFrom("adresse e-mail de l'administrateur du site", "Gourmand'Île");

  $mail->Subject = $subject;
  $content = $message;
  // Configuration du contenu HTML du courriel
  $mail->MsgHTML($content);
  
  if(!$mail->Send()) {
    // En cas d'erreur lors de l'envoi du courriel, renvoyer false
    return false;
  } else {
     // En cas de succès de l'envoi du courriel, renvoyer true
    return true;
  }
}