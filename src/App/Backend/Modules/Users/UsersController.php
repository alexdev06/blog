<?php
namespace ADABlog\App\Backend\Modules\Users;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class UsersController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        if ($this->app->visitor()->isAdministrator() == true) {
            $this->page->addVar('title', 'Gestion des utilisateurs');
            $manager = $this->managers->getManagerOf('Users');
            $this->page->addVar('listUsers', $manager->getList());
        } else {
            $this->app->httpResponse()->redirect('/admin-home');
        }
    }
}