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
    }
}