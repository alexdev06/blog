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

    public function executeDelete(HTTPRequest $request)
    {
        if ($this->app->visitor()->isAdministrator() == true) {
            $this->managers->getManagerOf('Users')->delete($request->getData('id'));
            $this->app->visitor()->setFlash('L\'utilisateur a bien été supprimé !');
            $this->app->httpResponse()->redirect('/admin-users');
        }
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($this->app->visitor()->isAdministrator() == true) {
            $this->managers->getManagerOf('Users')->modifyMemberStatus($request->getData('id'));
            $this->app->visitor()->setFlash('Le statut de l\'utilisateur a été changé !');
            $this->app->httpResponse()->redirect('/admin-users');
        }
    }
}