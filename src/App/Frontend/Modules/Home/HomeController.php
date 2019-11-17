<?php
namespace ADABlog\App\Frontend\Modules\Home;

use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class HomeController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Accueil');
        $this->page->addVar('visitor', $this->app->visitor());

        // Check for empty fields
        if (null !== $request->postData('name')) {
         
            $name = strip_tags(htmlspecialchars($request->postData('name')));
            $lastName = strip_tags(htmlspecialchars($request->postData('last_name')));
            $email_address = strip_tags(htmlspecialchars($request->postData('email')));
            $message = strip_tags(htmlspecialchars($request->postData('message')));
                
            // Create the email and send the message
            
            $email_subject = "Demande de contact sur le blog par :  $name $lastName";
            $email_body = "Vous avez reçu un nouveau message de contact en provenance de votre site.\n\n"."Les détails:\n\nPrénom: $name\n\nEmail: $email_address\n\nMessage:\n$message";

            $mail = new PHPMailer(true);

            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.ionos.fr';                        // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contact@alexandremanteaux.fr';         // SMTP username
            $mail->Password   = '21051982Azer;';                        // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->setFrom($email_address);
            $mail->addAddress('contact@alexandremanteaux.fr');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;
            $mail->send();
            $mail->ClearAddresses();

            $mail->addAddress($email_address);
            $mail->isHTML(true);
            $mail->setFrom('noreply@alexandremanteaux.fr');
            $mail->Subject = 'Demande de contact';
            $mail->Body    = 'Votre demande de contact a bien été prise en compte. Vous serez contacté dans les plus brefs délais';
            $mail->send();
        }
    }

}