<?php
namespace ADABlog\App\Backend\Modules\Disconnection;

use \ADABlog\Fram\BackController;
use \ADABlog\Fram\HTTPRequest;

class DisconnectionController extends BackController
{
    public function executeDisconnect()
    {
        $_SESSION = array();
        session_destroy();

        $this->app->httpResponse()->redirect('.');
    }
}