<?php
namespace ADABlog\App\Frontend\Modules\Inscription;

use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;
use ADABlog\Entity\User;

class InscriptionController extends BackController
{
    public function executeInscRequest(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Inscription');

        if ($request->postExists('login')) {
            $pass = $request->postData('password');
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            
            $user = new User([
                'name' => $request->postData('name'),
                'last_name' => $request->postData('lastName'),
                'username' => $request->postData('login'),
                'email' => $request->postData('email'),
                'password' => $pass
            ]);
             $this->managers->getManagerOf('users')->add($user);
        }
    }
} 