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
        $this->page->addVar('visitor', $this->app->visitor());
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

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('author')) {
            $this->processForm($request);
        }

        $this->page->addVar('title', 'Ajout d\'une news');
    }

    public function processForm(HTTPRequest $request)
    {
        $news = new News([
            'author' => $request->postData('author'),
            'title' => $request->postData('title'),
            'content' => $request->postData('content')
        ]);


        if ($request->postExists('id')) {
            $news->setId($request->postData('id'));
        }
 
        if ($news->isValid()) {
            $this->managers->getManagerOf('News')->save($news);
            $this->app->visitor()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée!');
            $this->app->httpResponse()->redirect('admin-news');
        } else {
            $this->page->addVar('erreurs', $news->erreurs());
        }

        $this->page->addVar('news', $news);
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('author')) {
            $this->processForm($request);
        } else {
            $this->page->addVar('news', $this->managers->getManagerOf('News')->getUnique($request->getData('id')));
        }

        $this->page->addVar('title', 'Modification d\'une news');
    }

}