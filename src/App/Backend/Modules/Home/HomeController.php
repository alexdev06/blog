<?php
namespace ADABlog\App\Backend\Modules\Home;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;

class HomeController extends BackController
{
    public function executeIndex(HTTPRequest $request)
        {
            $this->page->addVar('title', 'Accueil');
        }

}