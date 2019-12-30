<?php
namespace ADABlog\App\Backend\Modules\News;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;
use \ADABlog\Entity\News;
use \ADABlog\Fram\Visitor;

class NewsController extends BackController
{
    public function executeIndex()
    {
        $this->page->addVar('title', 'Gestion des news');
        $this->page->addVar('visitor', $this->app->visitor());

        $manager = $this->managers->getManagerOf('News');
        $this->page->addVar('listNews', $manager->getList());

        $this->page->addVar('newsCount', $manager->count());
    }

    public function executeShow(HTTPRequest $request)
    {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));

        if (empty($news)) {
            $this->app->httpResponse()->redirect404();
        }
        
        $this->page->addVar('visitor', $this->app->visitor());
        $this->page->addVar('title', $news->title());
        $this->page->addVar('news', $news);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
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

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('author')) {
            $this->processForm($request);
        } else {
            $this->page->addVar('news', $this->managers->getManagerOf('News')->getUnique($request->getData('id')));
        }

        $this->page->addVar('title', 'Modification d\'une news');
        
    }

    public function processForm(HTTPRequest $request)
    {
        $login = $this->app->visitor()->getLogin();
        $news = new News([
            'author' => $request->postData('author'),
            'title' => $request->postData('title'),
            'lead' => $request->postData('lead'),
            'content' => $request->postData('content'),
            'userUsername' => $login
        ]);

        if ($request->postExists('id')) {
            $news->setId($request->postData('id'));
        }
 
        if ($news->isValid()) {
            $this->managers->getManagerOf('News')->save($news);
            $this->app->visitor()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
            $this->app->httpResponse()->redirect('admin-news');
        } else {
            $this->page->addVar('erreurs', $news->erreurs());
        }

        $this->page->addVar('news', $news);
    }
}