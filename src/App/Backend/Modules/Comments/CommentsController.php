<?php
namespace ADABlog\App\Backend\Modules\Comments;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class CommentsController extends BackController
{
    public function executeIndex()
    {
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getList());
        $this->page->addVar('title', 'Gestion des commentaires');
        $this->page->addVar('visitor', $this->app->visitor());
    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
        $this->app->visitor()->setFlash('Le commentaire a bien été supprimé !');

        if (!$request->getExists('news_id')) {
            $this->app->httpResponse()->redirect('/admin-comments');
        } else {
            $this->app->httpResponse()->redirect('/admin-news'.$request->getData('news_id'));
        }
    }

    public function executeUpdate(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->modifyCommentStatus($request->getData('id'));
        $this->app->visitor()->setFlash('Le commentaire a bien été modifié !');
    
        if (!$request->getExists('news_id')) {
            $this->app->httpResponse()->redirect('/admin-comments');
        } else {
            $this->app->httpResponse()->redirect('/admin-news'.$request->getData('news_id'));
        }
    }

}