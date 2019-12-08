<?php 
namespace ADABlog\Model;

use ADABlog\Fram\Manager;
use ADABlog\Entity\Comment;

abstract class CommentsManager extends Manager
{
    abstract public function getId($id);
    abstract public function getList();
    abstract public function getListOf($newsId);
    abstract public function getListPublishedOf($newsId);
    abstract public function getListUnpublished();
    abstract public function add(Comment $comment);
    abstract public function modifyCommentStatus($id);
    abstract public function delete($id);

    public function save(Comment $comment)
    {
        if ($comment->isValid()) {
            $this->add($comment);
            return;
        } 
        
        throw new \RuntimeException('Le commentaire doit être validé pour être enregristré');
    
    }
}