<?php
namespace ADABlog\App\Backend\Modules\Comments;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class CommentsController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getList());
        $this->page->addVar('title', 'Les commentaires');
        $this->page->addVar('visitor', $this->app->visitor());
    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
        $this->app->visitor()->setFlash('Le commentaire a bien été supprimé !');
        $this->app->httpResponse()->redirect('/admin-comments');
    }

    public function executeUpdate(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->modifyCommentStatus($request->getData('id'));
        $this->app->visitor()->setFlash('Le commentaire a bien été modifié !');
        $this->app->httpResponse()->redirect('/admin-comments');
    }
}