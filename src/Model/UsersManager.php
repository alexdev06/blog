<?php 
namespace ADABlog\Model;

use \ADABlog\Fram\Manager;
use \ADABlog\Entity\User;

abstract class UsersManager extends Manager
{
    abstract public function add(User $user);
    abstract public function get($login);
    abstract public function getId($id);
    abstract public function getList();
    abstract public function modifyMemberStatus(User $user);
    abstract public function delete($id);
    abstract public function getEmail($email);
}