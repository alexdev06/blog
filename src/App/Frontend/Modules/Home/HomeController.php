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

            // reCAPTCHA
            $secret = "6LehGMAUAAAAAGT7FXQAvNN5APjP9d6mh7Qlp_rM";
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            
            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip ;
            
            $decode = json_decode(file_get_contents($api_url), true);
        
            if ($decode['success'] == true) {
                if (empty($request->postData('name')) || empty($request->postData('lastName')) || empty($request->postData('email')) || empty($request->postData('message')) ) {
                    $this->app->visitor()->setFlash('Tous les champs ne sont pas remplis!');
                } else {
                    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $request->postData('email'))) {
                        $this->app->visitor()->setFlash('Email invalide');
                    } elseif (strlen($request->postData('name')) <= 1) {
                        $this->app->visitor()->setFlash('Prénom trop court');
                    } elseif (strlen($request->postData('lastName')) <= 2) {
                        $this->app->visitor()->setFlash('Nom trop court');
                    } elseif (strlen($request->postData('message')) <= 2) {
                        $this->app->visitor()->setFlash('message trop court');
                    } else {
                        $name = strip_tags(htmlspecialchars($request->postData('name')));
                        $lastName = strip_tags(htmlspecialchars($request->postData('lastName')));
                        $email_address = strip_tags(htmlspecialchars($request->postData('email')));
                        $message = strip_tags(htmlspecialchars($request->postData('message')));
                            
                        // PHPMailer configuration
                        
                        $email_subject = "Demande de contact sur le blog par :  $name $lastName";
                        $email_body = "Vous avez reçu un nouveau message de contact en provenance de votre site.\n\n"."Les détails:\n\nPrénom: $name\n\nEmail: $email_address\n\nMessage:\n$message";

                        $mail = new PHPMailer(true);

                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.ionos.fr';                        // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'contact@alexandremanteaux.fr';         // SMTP username
                        $mail->Password   = '';                          // SMTP password
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

                        $this->app->visitor()->setFlash('Votre demande de contact a bien été envoyée!');
                    }
                }
            }
        }
    }

}