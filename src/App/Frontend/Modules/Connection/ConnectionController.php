<?php
namespace ADABlog\App\Frontend\Modules\Connection;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class ConnectionController extends BackController
{
    public function executeIdentification(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');
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

                $login = $request->postData('login');
                $password = $request->postData('password');

                $manager = $this->managers->getManagerOf('Users');
                $user = $manager->get($login);

               if (!isset($user) || empty($user)) {
                  $this->app->visitor()->setFlash('Pseudo incorrect');
              } else {
                  if (password_verify($password, $user->password())){
                      if ($user->administratorStatus() == true) {
                          $this->app->visitor()->setAuthenticated(true);
                          $this->app->visitor()->setAdministrator(true);
                          $this->app->httpResponse()->redirect('/admin');
                      } elseif ($user->memberStatus() == 1 && $user->administratorStatus() == 0) {
                          $this->app->visitor()->setAuthenticated(true);
                          $this->app->httpResponse()->redirect('/admin');
                          } else {
                              $this->app->visitor()->setFlash('Votre compte n\'a pas encore été validé');
                              $this->app->httpResponse()->redirect('/');
                          }
                    } else {
                        $this->app->visitor()->setFlash('Mot de passe incorrect');
                        $this->app->httpResponse()->redirect('/connection');
                  }
                }
            }
        }
    }
}