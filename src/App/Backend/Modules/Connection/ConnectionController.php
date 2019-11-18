<?php
namespace ADABlog\App\Backend\Modules\Connection;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;


class ConnectionController extends BackController
{
    public function executeIdentification(HTTPRequest $request)
    {
        $this->app->httpResponse()->redirect('/connexion');
    }
}
