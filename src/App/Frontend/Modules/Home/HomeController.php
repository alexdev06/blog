<?php
namespace ADABlog\App\Frontend\Modules\Home;

use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;

class HomeController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Accueil');
        $this->page->addVar('visitor', $this->app->visitor());
    }

}