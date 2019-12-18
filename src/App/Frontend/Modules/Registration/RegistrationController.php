<?php
namespace ADABlog\App\Frontend\Modules\Registration;

use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;
use ADABlog\Entity\User;

class RegistrationController extends BackController
{
    public function executeRegistRequest(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Inscription');
        $this->page->addVar('visitor', $this->app->visitor());

        if ($request->postExists('login')) {

            // reCAPTCHA
            /*$secret = "6LehGMAUAAAAAGT7FXQAvNN5APjP9d6mh7Qlp_rM";
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            
            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip ;
            
            $decode = json_decode(file_get_contents($api_url), true);
        
            if ($decode['success'] == true) {}*/

                if (empty($request->postData('name')) || empty($request->postData('lastName')) || empty($request->postData('email')) || empty($request->postData('login')) || empty($request->postData('password')) || empty($request->postData('passCheck')) ) {
                    $this->app->visitor()->setFlash('Tous les champs ne sont pas remplis!');
                } else {
                    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $request->postData('email'))) {
                        $this->app->visitor()->setFlash('Email invalide');
                    } elseif (strlen($request->postData('name')) <= 1) {
                        $this->app->visitor()->setFlash('Prénom trop court');
                    } elseif (strlen($request->postData('lastName')) <= 2) {
                        $this->app->visitor()->setFlash('Nom trop court');
                    } elseif (strlen($request->postData('login')) <= 2) {
                        $this->app->visitor()->setFlash('login trop court');
                    } elseif (strlen($request->postData('password')) <= 2) {
                        $this->app->visitor()->setFlash('Mot de passe trop court');
                    } else {
                        $pass = $request->postData('password');
                        $passCheck = $request->postData('passCheck');
                        if ($pass !== $passCheck) {
                            $this->app->visitor()->setFlash('Les mots de passe sont différents!');
                        } else {
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
                            
                            $user = new User([
                                'name' => $request->postData('name'),
                                'lastName' => $request->postData('lastName'),
                                'username' => $request->postData('login'),
                                'email' => $request->postData('email'),
                                'password' => $pass,
                            ]);
                            $pseudo = $this->managers->getManagerOf('Users')->get($user->username());
                            $email = $this->managers->getManagerOf('Users')->getEmail($user->email());
                            if (isset($pseudo) && $pseudo != false) {
                            $this->app->visitor()->setFlash('Le login n\'est plus disponible');
                            } elseif (isset($email) && $email != false) {
                                $this->app->visitor()->setFlash('L\'adresse email existe déjà!');
                            } else {
                                $this->managers->getManagerOf('Users')->add($user);
                                $this->app->visitor()->setFlash('La demande d\'inscription a bien été enregistrée');
                            }
                        }
                    }
                }
            //}
        }

    }

}