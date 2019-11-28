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
            $secret = "6LehGMAUAAAAAGT7FXQAvNN5APjP9d6mh7Qlp_rM";
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            
            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip ;
            
            $decode = json_decode(file_get_contents($api_url), true);
        
            if ($decode['success'] == true) {
                $pass = $request->postData('password');
                $passCheck = $request->postData('passCheck');
                if ($pass !== $passCheck) {
                    $this->app->visitor()->setFlash('Les mots de passe sont différents!');
                } else {
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    
                    $user = new User([
                        'name' => $request->postData('name'),
                        'last_name' => $request->postData('lastName'),
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

    }

}