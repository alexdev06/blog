<?php
namespace ADABlog\App\Backend\Modules\News;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;
use \ADABlog\Entity\News;

class NewsController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des news');
        $manager = $this->managers->getManagerOf('News');

        $this->page->addVar('listNews', $manager->getList());
        $this->page->addVar('newsCount', $manager->count());

        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListUnpublished());
    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('News')->delete($request->getData('id'));
        $this->app->visitor()->setFlash('La news a bien été supprimée !');
        $this->app->httpResponse()->redirect('/admin-news');
    }

}