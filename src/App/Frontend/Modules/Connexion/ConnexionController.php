<?php
namespace ADABlog\App\Frontend\Modules\Connexion;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class ConnexionController extends BackController
{
    public function executeIdentification(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');
        $this->page->addVar('visitor', $this->app->visitor());

        if ($request->postExists('login')) {
            $login = $request->postData('login');
            $password = $request->postData('password');

            $manager = $this->managers->getManagerOf('Users');
            $user = $manager->get($login);

            if (!isset($user) || empty($user)) {
                $this->app->visitor()->setFlash('Pseudo incorrect');
            } else {
                if (password_verify($password, $user->password())){
                    if ($user->administrator_status() == true) {
                        $this->app->visitor()->setAuthenticated(true);
                        $this->app->visitor()->setAdministrator(true);
                        $this->app->httpResponse()->redirect('/admin');
                    } elseif ($user->member_status() == 1 && $user->administrator_status() == 0) {
                        $this->app->visitor()->setAuthenticated(true);
                        $this->app->httpResponse()->redirect('/admin');
                    } else {
                        $this->app->visitor()->setFlash('Votre compte n\'a pas encore été validé');
                        $this->app->httpResponse()->redirect('/');
                    }
                } else {
                    $this->app->visitor()->setFlash('Mot de passe incorrect');
                    $this->app->httpResponse()->redirect('/connexion');
                }
             }
        }
    }
}